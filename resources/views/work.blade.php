@extends('layouts.app')
@section('content')
    <form id="workspace">
        <h2>Transcribe bib numbers</h2>
        <button type="button" class="btn info hotKeys" data-toggle="modal" data-target="#HotKeys">Hot Keys</button>
            <!-- Modal -->
            <div class="modal fade" id="HotKeys" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Keyboard Shortcuts</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>
                        Use <highlight>ENTER KEY</highlight> to go to <b>next</b> image, <highlight><br>CTRL + Shift + LEFT ARROW</highlight> to go to <b>previous</b> image.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div> 
                </div>
            </div>
        <hr>
        <div class="info-box">
            <p>Separate multiple label numbers with a space.</p>
            <p>Enter "<strong>m</strong>" for male, "<strong>f</strong>" for female, "<strong>u</strong>" for unknown (when a number is not fully visible) and "<strong>b</strong>" for blurry images.</p>
            <p>Ignore the people who are out of focus.</p>
        </div>
        @if(count($works) > 0)
            @foreach($works as $work)
                <div class="tab">
                <div class="image-wrapper">
                    <img src="{{ $work->image_url }}" class="img-zoom draggable">
                </div>

                <div class="bib-wrapper">
                    <div class="toolBar">
                        <div class="toolBarLeft">
                        <div class="fieldToolbar">
                            <label class="labelToolbar">Image: {{ $loop->iteration }} / 10</label>
                            <button type="button" class="btnImageNav" id="prevBtn" title="Previous Image" onclick="nextPrev(-1)"><i class="fa fa-play fa-flip-horizontal"></i></button>
                            <button type="button" class="btnImageNav" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-play" title="Next Image"></i></button>
                        </div>
                        </div>
                        <div class="thumbnail">
                        <img data-index="1" src="{{ $work->image_url }}" class="">
                        </div>
                    </div>
                    
                    <span class="bib-label">Runner Bib Numbers*</span> &nbsp;
                    <input value="{{ $work->bib }}" placeholder="Enter Bib Number..." name="bib" class="target" autocomplete="off">
                    
                    <span class="prev-section">Previous Bib Numbers : </span>
                    <div class="zoom-btn">
                        <!--<a href="#" id="previous" class="toolBarButton" title="Previous Image" onclick="nextPrev(-1)"><i class="fa fa-play fa-flip-horizontal"></i></a>
                            <a href="#" id="next" class="toolBarButton" title="Next Image" onclick="nextPrev(1)"><i class="fa fa-play"></i></a> -->
                        <button type="button" class="btn info" id="submitBtn" style="display:none;" onclick="nextPrev(1)">Submit</button>
                        <a class="btn info zoom-in" onclick="zoomin()" title="Zoon in"><i class="fa fa-plus-circle"></i></a>
                        <a class="btn info zoom-out" onclick="zoomout()" title="Zoon out"><i class="fa fa-minus-circle"></i></a>
                    </div>
                </div>
                </div>
            @endforeach
        @else
            <p>No tasks in the system</p>
        @endif
    </form>
    <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center;margin-top:40px; display: none;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
      </div>
@endsection
