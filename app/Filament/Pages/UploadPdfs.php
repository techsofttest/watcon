<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use BackedEnum;

class UploadPdfs extends Page implements HasForms
{
    use InteractsWithForms;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $title = 'Upload PDFs ZIP';
    protected static ?string $navigationLabel = 'Upload PDFs ZIP';
    protected string $view = 'filament.pages.upload-pdfs';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                FileUpload::make('zip_file')
                    ->label('Upload ZIP')
                    ->acceptedFileTypes([
                        'application/zip',
                        'application/x-zip-compressed',
                        'multipart/x-zip',
                        'application/x-compressed',
                    ])
                    ->preserveFilenames()
                    ->required(),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Upload & Extract')
                ->action('submit'),
        ];
    }

   public function submit(): void
{
    $data = $this->form->getState();
    $zipFile = $data['zip_file'] ?? null;

    if (!$zipFile) {
        Notification::make()
            ->title('ZIP file missing')
            ->danger()
            ->send();
        return;
    }

    $fullZipPath = Storage::disk('public')->path($zipFile);
    $destination = Storage::disk('public')->path('pdfs');

    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    $zip = new ZipArchive;
    $extractedCount = 0;

    if ($zip->open($fullZipPath) === true) {
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $file = $zip->getNameIndex($i);

            // Skip directories
            if (substr($file, -1) === '/') {
                continue;
            }

            // Check if it's a PDF
            if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) !== 'pdf') {
                continue;
            }

            $contents = $zip->getFromIndex($i);
            $filename = basename($file);
            
            // Actually write the file
            $bytesWritten = file_put_contents($destination . '/' . $filename, $contents);
            
            if ($bytesWritten !== false) {
                $extractedCount++;
            }
        }
        $zip->close();
    } else {
        Storage::disk('public')->delete($zipFile);
        
        Notification::make()
            ->title('Failed to open ZIP file')
            ->danger()
            ->send();
        return;
    }

    // Delete the temporary ZIP file
    Storage::disk('public')->delete($zipFile);

    // Show appropriate notification based on results
    if ($extractedCount > 0) {
        Notification::make()
            ->title('Success!')
            ->body("Extracted {$extractedCount} PDF file(s)")
            ->success()
            ->send();
    } else {
        Notification::make()
            ->title('No PDFs found')
            ->body('The ZIP file did not contain any PDF files.')
            ->warning()
            ->send();
    }

    $this->form->fill();
}



}