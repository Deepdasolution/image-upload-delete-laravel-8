<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        {{-- Bootstrap Style Css --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <p>{{session('success')}}</p>
            </div>

            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                <p>{{session('error')}}</p>
            </div>

            @endif
            <div class="row" style="height: 100vh">
                <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                    <form action="{{route('devtube.media.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="image">Upload image</label>
                            <input type="file" class="form-control-file" name="image" id="image" required>
                        </div>

                        <button class="btn btn-primary">Save Image</button>
                    </form>

                    <div class="d-flex flex-wrap">
                        @forelse ($medias as $media)
                        <div class="image-div m-3" id="image-{{$media->id}}">
                            <img src="{{asset($media->image)}}" alt="Image" height="200px" width="200px"><br>
                            <button class="btn btn-danger btn-block"
                                onclick="deleteImage({{$media->id}})">Remove</button>
                        </div>

                        @empty

                        @endforelse
                    </div>
                </div>
            </div>



            {{-- Bootstrap Script  --}}
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous">
            </script>

            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
            </script>


            <script>
                function deleteImage(id){

                    $.ajax({
                        type:'get',
                        url: '{{asset("devtube/media/delete")}}/'+id,
                        success: function(response){
                            $('#image-'+id).addClass('d-none');
                            alert('Image deleted successfully');
                        }
                    })
                    }
            </script>

    </body>

</html>
