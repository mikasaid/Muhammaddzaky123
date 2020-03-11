@extends('layouts.admin')
@section('custom_head')
    <!-- form Uploads -->
    <link href="{{asset('plugins/fileuploads/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Add New Menu</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" name="title" class="form-control" required
                                               placeholder="Programming...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Parent</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="parent" name="parent">
                                            <option value="0">No Parent</option>
                                            @foreach($parents as $parentsItem)
                                                <option value="{{$parentsItem->id}}">{{$parentsItem->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="image" class="dropify"
                                               data-height="200"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Link</label>
                                    <div class="col-md-10">
                                        <input type="text" name="link" class="form-control"
                                               placeholder="http://www....."
                                               value="">
                                    </div>
                                </div>
                                <button type="submit"
                                        class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">
                                    Submit
                                </button>
                            </form>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>

            </div>
        </div>
        <!-- end: panel body -->

    </div> <!-- content -->

    <footer class="footer">
        © xAdmin 2020
    </footer>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

@endsection
@section('custom_scripts')
    <!-- file uploads js -->
    <script src="{{asset('plugins/fileuploads/js/dropify.min.js')}}"></script>

    <script>
        var resizefunc = [];
    </script>
    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'Drag or click the image here',
                'replace': 'Drag or click here to replace the image',
                'remove': 'Clear',
                'error': 'Sorry, an error has occurred'
            },
            error: {
                'fileSize': 'Image size is larger than allowed (3M)'
            }
        });
    </script>
@endsection
