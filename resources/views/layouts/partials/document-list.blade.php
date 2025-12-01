<style>
.case-law-box {
    display: flex;
    justify-content: space-between;
    padding: 8px 0px;
    margin-bottom: 10px;
    border-radius: 6px;
    color:white;
}

.case-law-box .row-item {
    flex: 1;
}


.case-law-box strong {
    display: inline-block;
    min-width: 60px; /* label width */
    font-weight: 600;
}
</style>

@if($all->count() > 0)

    @foreach ($all as $item)
        <div class="col-md-12 d-flex document-box">
            <div class="data-sec">

            <elem class="pdf-btn"><a target="_blank" href="{{asset('storage')}}/pdfs/uploads/c192001.pdf"><i class="fas fa-download"></i></a></elem>


                <h4>{{ $item->categories->pluck('name')->join(', ') }}</h4>
               

                <h3>{{ $item->title ?? $item->parties }}</h3>

                <p class="headnote-text">
                {{ $item->headnote }}
                </p>


            @if($item->type=='case_law')
            <div class="case-law-box">
    <div class="row-item">
        <strong>Court : </strong> {{ $item->court ?? '-' }}
    </div>

    <div class="row-item">
        <strong>Citation / Case No : </strong> {{ $item->case_no ?? '-' }}
    </div>
</div>

<div class="case-law-box">
    <div class="row-item">
        <strong>Date Of Judgement : </strong> {{ $item->date_of_judgement ?? '-' }}
    </div>

    <div class="row-item">
        <strong>Type Of Order : </strong> {{ $item->order_type_name ?? '-' }}
    </div>
</div>
            @endif



        <a href="javascript:void(0);" class="rr-daa read-more-btn">Read More</a>

                <span>{{ $item->year }}</span>
            </div>
        </div>
    @endforeach

@else
    <div class="col-md-12 text-center py-4">
        <p style="font-size:18px; color:#888;">No documents found</p>
    </div>
@endif