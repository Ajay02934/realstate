@extends('app')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions Page</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <button id="allPromotionsBtn">All Promotions</button>
            <button id="newCustomersBtn">New Customers</button>
        </nav>
    </header>

    <main>
        <section id="promotions" class="promotions-section">
      
        </section>
    </main>


    <script  src="{{ asset('script.js') }}" ></script>


</body>
</html>
