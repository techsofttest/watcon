@php
    $statePath = $getStatePath();
@endphp

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div
        wire:ignore
        x-data="{
            state: $wire.entangle('{{ $statePath }}'),
            editor: null,

            init() {
                console.log('CKEditor component initialized');
                this.loadCKEditor();
            },

            loadCKEditor() {
                // Check if CKEditor is already loaded
                if (window.CKEDITOR) {
                    console.log('CKEditor already loaded');
                    this.createEditor();
                    return;
                }

                console.log('Loading CKEditor...');
                
                // Check every 100ms if CKEditor is loaded
                const checkInterval = setInterval(() => {
                    if (window.CKEDITOR && window.CKEDITOR.ClassicEditor) {
                        console.log('CKEditor loaded successfully');
                        clearInterval(checkInterval);
                        this.createEditor();
                    }
                }, 100);

                // Timeout after 10 seconds
                setTimeout(() => {
                    if (!window.CKEDITOR) {
                        clearInterval(checkInterval);
                        console.error('CKEditor failed to load after 10 seconds');
                        console.log('Window object:', Object.keys(window).filter(k => k.includes('CK') || k.includes('Editor')));
                    }
                }, 10000);
            },

            createEditor() {
                console.log('Creating editor instance...');
                
                // Detect dark mode
                const isDark = document.documentElement.classList.contains('dark');
                
                const config = {
                    // Remove collaboration and premium features
                    removePlugins: [
                        'AIAssistant',
                        'RealTimeCollaborativeEditing',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                        'MathType',
                        'SlashCommand',
                        'Template',
                        'DocumentOutline',
                        'FormatPainter',
                        'TableOfContents',
                        'PasteFromOfficeEnhanced',
                        'CaseChange'
                    ],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'uploadImage',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            '|',
                            'undo',
                            'redo'
                        ]
                    },
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'toggleImageCaption',
                            '|',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side',
                            '|',
                            'resizeImage'
                        ],
                        resizeOptions: [
                            {
                                name: 'resizeImage:original',
                                label: 'Original',
                                value: null
                            },
                            {
                                name: 'resizeImage:25',
                                label: '25%',
                                value: '25'
                            },
                            {
                                name: 'resizeImage:50',
                                label: '50%',
                                value: '50'
                            },
                            {
                                name: 'resizeImage:75',
                                label: '75%',
                                value: '75'
                            }
                        ],
                        resizeUnit: '%'
                    }
                };

                @if($getUploadUrl())
                config.simpleUpload = {
                    uploadUrl: '{{ $getUploadUrl() }}',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]').content
                    }
                };
                @endif

                // Use CKEDITOR.ClassicEditor for Super Build
                CKEDITOR.ClassicEditor
                    .create(this.$refs.editor, config)
                    .then(editor => {
                        console.log('Editor created successfully');
                        this.editor = editor;
                        
                        // Apply dark mode styles if needed
                        if (isDark) {
                            const editorElement = editor.ui.view.editable.element;
                            editorElement.style.backgroundColor = '#1f2937';
                            editorElement.style.color = '#f9fafb';
                        }

                        // Set initial data
                        if (this.state) {
                            editor.setData(this.state);
                        }

                        // Listen for changes
                        editor.model.document.on('change:data', () => {
                            this.state = editor.getData();
                        });
                        
                        // Watch for dark mode changes
                        const observer = new MutationObserver((mutations) => {
                            mutations.forEach((mutation) => {
                                if (mutation.attributeName === 'class') {
                                    const isDarkNow = document.documentElement.classList.contains('dark');
                                    const editorElement = editor.ui.view.editable.element;
                                    
                                    if (isDarkNow) {
                                        editorElement.style.backgroundColor = '#1f2937';
                                        editorElement.style.color = '#f9fafb';
                                    } else {
                                        editorElement.style.backgroundColor = '#ffffff';
                                        editorElement.style.color = '#000000';
                                    }
                                }
                            });
                        });
                        
                        observer.observe(document.documentElement, {
                            attributes: true,
                            attributeFilter: ['class']
                        });
                    })
                    .catch(error => {
                        console.error('CKEditor initialization failed:', error);
                    });
            }
        }"
    >
        <div x-ref="editor" style="min-height: 200px;"></div>
    </div>
</x-dynamic-component>

{{-- Load CKEditor script --}}
@pushOnce('scripts')
    <script>
        console.log('Loading CKEditor script...');
        
        if (!window.CKEDITOR) {
            const script = document.createElement('script');
            script.src = 'https://cdn.ckeditor.com/ckeditor5/41.2.0/super-build/ckeditor.js';
            script.onload = () => {
                console.log('CKEditor script loaded from CDN');
                console.log('Available:', window.CKEDITOR ? 'CKEDITOR found' : 'CKEDITOR not found');
            };
            script.onerror = () => {
                console.error('Failed to load CKEditor script from CDN');
            };
            document.head.appendChild(script);
        } else {
            console.log('CKEditor already available');
        }
    </script>
@endPushOnce

{{-- Dark mode styles --}}
@pushOnce('styles')
    <style>
        .dark .ck.ck-editor__main > .ck-editor__editable {
            background-color: #1f2937 !important;
            color: #f9fafb !important;
        }
        
        .dark .ck.ck-toolbar {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
        }
        
        .dark .ck.ck-button,
        .dark .ck.ck-button.ck-off {
            background-color: transparent !important;
            color: #f9fafb !important;
        }
        
        .dark .ck.ck-button:hover,
        .dark .ck.ck-button.ck-on {
            background-color: #4b5563 !important;
        }
        
        .dark .ck.ck-dropdown__panel {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
        }
        
        .dark .ck.ck-list__item {
            color: #f9fafb !important;
        }
        
        .dark .ck.ck-list__item:hover {
            background-color: #4b5563 !important;
        }
        
        .dark .ck.ck-editor__editable {
            border-color: #4b5563 !important;
        }
    </style>
@endPushOnce