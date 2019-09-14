<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quick Count</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
</head>
<body>
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://cdn.techinasia.com/data/images/LzvV52o01nNnKw9jBzEU9yTsdLLLNINayjwdwxV3.png" alt="" width="72" height="72">
        <h2>Quick Count Republik DumbWays</h2>
        <p class="lead">Pemilihan Presiden dan Wakil Presidan</p>
    </div>
    <table class="table table-bordered">
        <tbody>
        @foreach ($candidateList as $candidate)
            <tr>
                <th><h2>{{$candidate->name}}</h2></th>
                <th rowspan="2" style="vertical-align: middle;text-align: center;"><a href="#!" class="btn btn-primary" onclick="sendvote({{$candidate->id}})">Tambah</a></th>
            </tr>
            <tr>
                <td><h5>Perolehan suara: <span id="candidate-{{$candidate->id}}">{{number_format($candidate->earned_vote)}}</span></h5></td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(function () {

    });
    var voteURI = "{{route('send.vote')}}";


    function sendvote(id) {
        var elementId = "#candidate-" + id;
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id,
        };
        $.ajax({
            type: "POST",
            url: voteURI,
            data: data,
            success: function (response) {
              if(response.success) {
                  var result = response.count[0].earned_vote;
                  $(elementId).text(result)
              } else {
                alert('error')
              }
            },
            error: function (jqXHR, exception) {

            },
        });
    };

</script>
</body>
</html>
