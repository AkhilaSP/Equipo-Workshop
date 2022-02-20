<meta charset="utf-8" />
<title>Equipo Health Workshop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta content="" name="description" />
<script>
    var appURL = '{{ config('global.server_url') }}';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/editor.js"></script>
<script>
    $(document).ready(function() {
        $("#chiefComplaint").Editor();
        $("#consultationNote").Editor();
    });
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="css/editor.css" type="text/css" rel="stylesheet"/>
<link href="css/icons.css" type="text/css" rel="stylesheet"/>

