    <?php
        $rec_id = $masterRecordId ?? null;
        $page_id = "tab-".random_str(6);
    ?>
    <div class="master-detail-page card">
        <div class="card-header text-bold h5 p-3 mb-3">Users Records</div>
        <div class="p-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a data-bs-toggle="tab" href="#contestcategories_<?php echo $page_id ?>" class="nav-link active">
                    User Contest Categories
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="tab" href="#contestnominees_<?php echo $page_id ?>" class="nav-link ">
                User Contest Nominees
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="tab" href="#contestvotes_<?php echo $page_id ?>" class="nav-link ">
            User Contest Votes
        </a>
    </li>
    <li class="nav-item">
        <a data-bs-toggle="tab" href="#electionpositions_<?php echo $page_id ?>" class="nav-link ">
        User Election Positions
    </a>
</li>
</ul>
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="contestcategories_<?php echo $page_id ?>" role="tabpanel">
    <div class=" ">
        <?php
            $params = ['updated_by' => $rec_id,'show_header' => false]; //new query param
            $query = array_merge(request()->query(), $params);
            $queryParams = http_build_query($query);
            $url = url("contestcategories/index/updated_by/$rec_id?$queryParams");
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
        $params = ['user_id' => $rec_id,'show_header' => false]; //new query param
        $query = array_merge(request()->query(), $params);
        $queryParams = http_build_query($query);
        $url = url("contestnominees/index/user_id/$rec_id?$queryParams");
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
<div class="tab-pane fade show " id="contestvotes_<?php echo $page_id ?>" role="tabpanel">
<div class=" ">
    <?php
        $params = ['candidate_id' => $rec_id,'show_header' => false]; //new query param
        $query = array_merge(request()->query(), $params);
        $queryParams = http_build_query($query);
        $url = url("contestvotes/index/candidate_id/$rec_id?$queryParams");
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
<div class="tab-pane fade show " id="electionpositions_<?php echo $page_id ?>" role="tabpanel">
<div class=" ">
    <?php
        $params = ['admin_id' => $rec_id,'show_header' => false]; //new query param
        $query = array_merge(request()->query(), $params);
        $queryParams = http_build_query($query);
        $url = url("electionpositions/index/admin_id/$rec_id?$queryParams");
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
