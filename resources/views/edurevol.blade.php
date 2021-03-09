<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>

</head>
<body>
<div class="create container justify-content-center col-8 text-center" style="height: 100vh">
    <div class="text-center w-100">
                <br><br>
                <h1><i>Edurevol </i> </h1>
     </div>
<br><br>
{{-- checking for errors --}}
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
              @endif
            <br><br>

            <h2 class="text-center">Add URL</h2>
<div class="d-flex justify-content-center">
    
    {{-- form to add new youtube link --}}
    <form action="{{ route('add') }}" method="post" class="m-3">
            @csrf
            <div class="row">
                <div class="col">
                   {{-- section --}}
                    <label for="section">section</label>
                    <select name="section" class="op">
                        <option hidden disabled selected value> -- select an option -- </option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                    </select>
                </div>
                {{-- cource_id --}}
                <div class="col">
                    <label for="cource_id">cource_id</label> 
                    <select name="cource_id" class="op2">
                        <option hidden disabled selected value> -- select an option -- </option>
                    </select>
                </div>
                <div class="col">
                    {{-- url --}}
                    <label for="url">url</label>

                        <input type="url" name="url" id="" placeholder="www.youtube.com">
                </div>
                 <div class="col-12">
                        <input class="form-control btn btn-primary mt-5 " type="submit"  class="action-button" value="Confirm" />
                </div>
            </div>
             
        </form>            


    </div>
<br><br>
                <!-- Section: Filters -->
                <section>
              
                  <h2 class="text-center">Filters</h2>

                  <br><br>
              
                  <!-- Section: Condition -->
                  <div class="row">
                      <div class="col-12" style="    text-align: -webkit-center;">
                        <section class="mb-4">
              {{-- filter form --}}
                            <form action="{{ route('filter') }}" method="GET" style="margin-top: 20px;">           
                                <div class="form-check pl-0 mb-3">
                                    <label for="section">section</label>
                                    <select name="section" class="sop">
                                        <option hidden disabled selected value> -- select an option -- </option>
                
                
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                        <option value="3">III</option>
                                        <option value="4">IV</option>
                                    </select>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                    <label for="cource_id">cource_id</label>
                                    <select name="cource_id" class="sop2">
                                        <option hidden disabled selected value> -- select an option -- </option>
                                    </select>
                                </div>
                                {{--submit button--}}
                                    <input type="submit" class="btn btn-primary btn-sm" value="Filter">   
                                    {{--home button to remove filter simpaly redirect to main page--}}
                                    <a href="{{route('home')}}" class="btn btn-danger btn-sm">clear filter</a>
                       
                                </section>
                            </form>
                            <br>
                      </div>  
                        <div class="col-12">
                            <section class="mb-5 " style="display: flex;  overflow: scroll;">
                                @foreach ($links as $link)
                                <br><br>
                                <a href="https://www.youtube.com/watch?v={{$link->url}}" target="blank"> 
                                    <img class="m-2"
                                src="https://img.youtube.com/vi/{{$link->url}}/hqdefault.jpg"
                                width="250" />
                            </a>
                                <br>
                                @endforeach
                                    
                            </section>

                        </div>    
            </div>
                    




                
                </section>              






        </body>
</html>
<script type="text/javascript">
// for each value of sector the cource id option is append in op2 and sop2 class select a simple jquery 
    $(document).ready(function(){
        $('.op').change(function() {
    var options = '';
    if($(this).val() == '1') {
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="1">112</option><option value="2">113</option>';
    }
    else if ($(this).val() == '2'){
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="3">221</option><option value="4">223</option>';
    }
    else if ($(this).val() == '3'){
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="5">331</option><option value="6">322</option>';
    }
    else if ($(this).val() == '4'){
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="7">442</option><option value="8">448</option>';
    }

    $('.op2').html(options);
});

 $('.sop').change(function() {
    var options = '';
    if($(this).val() == '1') {
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="1">112</option><option value="2">113</option>';
    }
    else if ($(this).val() == '2'){
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="3">221</option><option value="4">223</option>';
    }
    else if ($(this).val() == '3'){
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="5">331</option><option value="6">322</option>';
    }
    else if ($(this).val() == '4'){
        options = '                        <option hidden disabled selected value> -- select an option -- </option><option value="7">442</option><option value="8">448</option>';
    }

    $('.sop2').html(options);
});
    });
</script>