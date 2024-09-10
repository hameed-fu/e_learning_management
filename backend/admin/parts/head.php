<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>E Learning Platfom</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.12/build/css/intlTelInput.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.12/build/js/intlTelInput.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var input = document.querySelector("#phone_no");
            var iti = window.intlTelInput(input, {
                initialCountry: "pk",
                separateDialCode: true,
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.12/build/js/utils.js",

            });

            // store the instance variable so we can access it in the console e.g. window.iti.getNumber()
            window.iti = iti;

            // Rest of your script...
        });
    </script>

</head>