<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-gaji" aria-controls="navs-justified-gaji" aria-selected="true"><i
                    class="tf-icons bx bx-dollar-circle me-1"></i> GAJI </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-thr" aria-controls="navs-justified-thr" aria-selected="false"
                tabindex="-1"><i class="tf-icons bx bx-money-withdraw me-1"></i>
                THR</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-ikp" aria-controls="navs-justified-ikp" aria-selected="false"
                tabindex="-1"><i class="tf-icons bx bx-money-withdraw me-1"></i>
                IKP</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-tw1" aria-controls="navs-justified-tw1" aria-selected="false"
                tabindex="-1"><i class="tf-icons bx bx-money-withdraw me-1"></i>
                TW1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-tw2" aria-controls="navs-justified-tw2" aria-selected="false"
                tabindex="-1"><i class="tf-icons bx bx-money-withdraw me-1"></i>
                TW2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-tw3" aria-controls="navs-justified-tw3" aria-selected="false"
                tabindex="-1"><i class="tf-icons bx bx-money-withdraw me-1"></i>
                TW3</button>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="navs-justified-gaji" role="tabpanel">
            @include('pages.Gaji.Submission.components.TabContentGaji')
        </div>
        <div class="tab-pane fade" id="navs-justified-thr" role="tabpanel">
            @include('pages.Gaji.Submission.components.TabContentTHR')
        </div>
        <div class="tab-pane fade" id="navs-justified-ikp" role="tabpanel">

        </div>
        <div class="tab-pane fade" id="navs-justified-tw1" role="tabpanel">

        </div>
        <div class="tab-pane fade" id="navs-justified-tw2" role="tabpanel">

        </div>
        <div class="tab-pane fade" id="navs-justified-tw3" role="tabpanel">

        </div>
    </div>

</div>

