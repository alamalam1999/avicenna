<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Student - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">FHOTO</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NAME</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $student->name) }}" placeholder="Masukkan nama">
                            
                                <!-- error message untuk title -->
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">GENDER</label>
                                <select type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender', $student->gender) }}" placeholder="Masukkan gender">
                                    <option value="Laki-Laki" {{ $student->gender == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $student->gender == "Perempuan" ? 'selected' : '' }}>Perempuan</option>       
                                </select>

                                <!-- error message untuk title -->
                                @error('gender')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis', $student->nis) }}" placeholder="Masukkan nis">
                            
                                <!-- error message untuk title -->
                                @error('nis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">BORN PLACE</label>
                                <input type="text" class="form-control @error('bornplace') is-invalid @enderror" name="bornplace" value="{{ old('bornplace', $student->bornplace) }}" placeholder="Masukkan Born Place">
                            
                                <!-- error message untuk title -->
                                @error('bornplace')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">BORN DATE</label>
                                <input type="date" class="form-control @error('borndate') is-invalid @enderror" name="borndate" value="{{ old('borndate', $student->borndate) }}" placeholder="Masukkan borndate">
                            
                                <!-- error message untuk title -->
                                @error('borndate')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">RELIGION</label>
                                <select type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion', $student->religion) }}" placeholder="Masukkan religion">
                                    <option value="Laki-Laki" {{ $student->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ $student->religion == "Kristen" ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ $student->religion == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ $student->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ $student->religion == "Budha" ? 'selected' : '' }}>Budha</option>
                                    <option value="Konghucu" {{ $student->religion == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('religion')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">SCHOOL</label>
                                <select type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school', $student->school) }}" placeholder="Masukkan school">
                                    <option value="School" {{ $student->school == "Cinere" ? 'selected' : '' }}>Cinere</option>
                                    <option value="Pamulang" {{ $student->school == "Pamulang" ? 'selected' : '' }}>Pamulang</option>
                                    <option value="Jagakarsa" {{ $student->school == "Jagakarsa" ? 'selected' : '' }}>Jagakarsa</option>
                                </select>

                                <!-- error message untuk title -->
                                @error('school')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">CLASS</label>
                                <input type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class', $student->class) }}" placeholder="Masukkan Class">
                            
                                <!-- error message untuk title -->
                                @error('class')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
