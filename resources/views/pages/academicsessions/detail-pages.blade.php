    <?php
        $rec_id = $masterRecordId ?? null;
        $page_id = "tab-".random_str(6);
    ?>
    <div class="master-detail-page card">
        <div class="card-header text-bold h5 p-3 mb-3">Academic Sessions Records</div>
        <div class="p-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a data-bs-toggle="tab" href="#contestcategories_<?php echo $page_id ?>" class="nav-link active">
                    Academic Session Contest Categories
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#contestnominees_<?php echo $page_id ?>" class="nav-link ">
                Academic Session Contest Nominees
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#pricesettings_<?php echo $page_id ?>" class="nav-link ">
            Academic Session Price Settings
        </a>
    </li>
</ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="contestcategories_<?php echo $page_id ?>" role="tabpanel">
    <div class=" ">
        <?php
            $params = ['academic_session_id' => $rec_id,'show_header' => false]; //new query param
            $query = array_merge(request()->query(), $params);
            $queryParams = http_build_query($query);
            $url = url("contestcategories/index/academic_session_id/$rec_id?$queryParams");
        ?>
        <div class="ajax-inline-page" data-url="{{ $url }}" >
            <div class="ajax-page-load-indicator">
                <div class="text-center d-flex justify-content-center load-indicator">
                    <span class="loader mr-3"></span>
                    <span class="fw-bold">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade show " id="contestnominees_<?php echo $page_id ?>" role="tabpanel">
<div class=" ">
    <?php
        $params = ['academic_session' => $rec_id,'show_header' => false]; //new query param
        $query = array_merge(request()->query(), $params);
        $queryParams = http_build_query($query);
        $url = url("contestnominees/index/academic_session/$rec_id?$queryParams");
    ?>
    <div class="ajax-inline-page" data-url="{{ $url }}" >
        <div class="ajax-page-load-indicator">
            <div class="text-center d-flex justify-content-center load-indicator">
                <span class="loader mr-3"></span>
                <span class="fw-bold">Loading...</span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="tab-pane fade show " id="pricesettings_<?php echo $page_id ?>" role="tabpanel">
<div class=" ">
    <?php
        $params = ['accademic_session_id' => $rec_id,'show_header' => false]; //new query param
        $query = array_merge(request()->query(), $params);
        $queryParams = http_build_query($query);
        $url = url("pricesettings/index/accademic_session_id/$rec_id?$queryParams");
    ?>
    <div class="ajax-inline-page" data-url="{{ $url }}" >
        <div class="ajax-page-load-indicator">
            <div class="text-center d-flex justify-content-center load-indicator">
                <span class="loader mr-3"></span>
                <span class="fw-bold">Loading...</span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
