<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSV Upload</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    </head>
    <style>
        .box {
            position: relative;
            background: #ffffff;
            width: 100%;
        }
        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
            border-bottom: 1px solid #f4f4f4;
            margin-bottom: 10px;
        }
        .box-tools {
            position: absolute;
            right: 10px;
            top: 5px;
        }
        .dropzone-wrapper {
            border: 2px dashed #91b0b3;
            color: #92b0b3;
            position: relative;
            height: 150px;
        }
        .dropzone-desc {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            text-align: center;
            width: 40%;
            top: 50px;
            font-size: 16px;
        }
        .dropzone,
        .dropzone:focus {
            position: absolute;
            outline: none !important;
            width: 100%;
            height: 150px;
            cursor: pointer;
            opacity: 0;
        }
        .dropzone-wrapper:hover,
        .dropzone-wrapper.dragover {
                background: #ecf0f5;
            }
        .preview-zone {
            text-align: center;
        }
        .preview-zone .box {
            box-shadow: none;
            border-radius: 0;
            margin-bottom: 0;
        }
    </style>
    <body>
        <div class="container">
            <div class="py-5 text-center">
                  <p class="lead" style="font-weight: bold;">CSV File Managment</p>
            </div>
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                        <i class="glyphicon glyphicon-download-alt"></i>
                        <p>Choose an image file or drag it here.</p>
                    </div>
                        <input type="file" name="img_logo" class="dropzone">
                </div>
                <div class="row">
                    <div class="col-md-12 text-right" style="padding-top: 1rem; padding-bottom: 2rem;">
                        <button type="submit" class="btn btn-primary">Upload File</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="justify-content-center">
                <table id="table_csv" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mesin</th>
                            <th>Bulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Mesin</th>
                            <th>Bulan</th>
                            <th>Aksi</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function() {
        var table = $('#table_csv').DataTable({
                        responsive : true
                    });
    });
</script>