<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flexwaves</title>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
    </style>
    
    <style>
        *{
            margin: 0;
            padding: 0;
         }

        body{
            min-height: 100vh;
            font-family: "Nunito";
        }

        /* NAVBAR CSS */

        .navbar{
            box-shadow: 0px 0px 5px;
        }

        .navbar ul{
            width: 100%;
            list-style: none;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar a{
            height: 100%;
            padding: 0 30px;
            text-decoration: none;
            display: flex;
            align-items: center;
            color: black;
        }


        .navbar li{
            height: 70px;
        }

        /* .navbar li:not(:first-child){
            color: white;
        } */

        .navbar li:not(:first-child):hover{
            background: linear-gradient(to bottom, #8080D7, #05c8d6);
            color: white;
        }

        .navbar li:first-child{
            margin-right: auto;
            font-weight: bold;
        }

        /* END-NAVBAR CSS */

        /* LANDING PAGE CSS */

        /* .header {
            background: linear-gradient(to bottom, #05c8d6, #8080D7); 
            color: #000000; 
            text-align: left;
            padding: 50px;
        } */

        .header h1 {
            font-size: 80px;
            margin-bottom: 10px;
        }

        .highlight {
            color: #ffffff; /* White color for the highlighted text */
        }

        .header p {
            font-size: 18px;
        }

        .search-container {
            text-align: center;
            padding: 20px;
            background: linear-gradient(to bottom, #800080, #C71585); /* Dark to light purple gradient */
        }

        .search-inputs {
            display: flex;
            justify-content: space-between;
            align-items: center; 
            max-width: 250px; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the search inputs horizontally */
        }

        .search-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: white;
            color: black; /* White text color */
            border: 2px solid #6d6dce; /* Black border */
            border-radius: 10px; /* Rounded edges */
            cursor: pointer;
            transition: 
                transform 0.15s ease-out,
                color 0.15s ease-out,
                background-color 0.15s ease-out;
        }

        .search-button:hover {
            transform: translate(5px, 5px);
            color: white;
            background: #6d6dce;
            font-weight: bold;
        }

        .footer {
            background-color: #ffffff;
            text-align: center;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            color: #8080D7; /* Purple color */
            font-size: 30px;
        }

        /* --- Academy Info --- */
        .academy-info{
            width: 80%;
            margin: auto;
            text-align: center;
            padding-top: 40px;
        }

        .academy-info h1{
            font-size: 36px;
            font-weight: 600
        }

        .academy-info p{
            color: #616161;
            font-size: 14px;
            font-weight: 300;
            line-height: 22px;
            padding: 10px;
        }

        .academy-info .row{
            margin-top: 3%;
            display: flex;
            justify-content: space-between;
        }

        .academy-info .row .academy-col{
            flex-basis: 30%;
            border-radius: 10px;
            margin-bottom: 5%;
            padding: 20px 12px;
            box-sizing: border-box;
            background:#d7d7ff;
            transition: 0.5s;
        }

        .academy-info .row .academy-col h3{
            text-align: center;
            font-weight: 600;
            margin: 10px 0;
        }

        .academy-info .row .academy-col:hover {
            box-shadow: 0 0 20px 0px rgba(0,0,0,0.2);
        }

        @media(max-width: 700px){
            .academy-info .row{
                flex-direction: column;
            }
        }

        /* END-LANDING PAGE CSS */

        /* ACADEMY PAGE CSS */

        .header {
            background: linear-gradient(to bottom, #05c8d6, #8080D7); /* Dark to light purple gradient */
            color: #000000; /* Black text color */
            text-align: center;
            padding: 50px;
        }

        .header h1 {
            font-size: 80px;
            margin-bottom: 10px;
        }

        .highlight {
            color: #ffffff; /* White color for the highlighted text */
        }

        .header p {
            font-size: 18px;
        }

        .search-inputs-academy {
            display: flex;
            justify-content: space-between;
            align-items: center; 
            max-width: 800px; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the search inputs horizontally */
        }

        .job-input, .location-input {
            flex: 1; /* Distribute available space equally between the inputs */
            padding: 10px;
            margin-right: 10px; /* Adjusted margin between inputs */
            border: 1px solid #ccc;
            border-radius: 10px; /* Rounded edges */
        }

        /* .search-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #0495b900; 
            color: #ffffff; 
            border: 2px solid #ffffff; 
            border-radius: 10px; 
            cursor: pointer;
        } */

        /* .search-button2 {
                padding: 10px 20px;
                font-size: 16px;
                background-color: #0495b9; 
                color: #ffffff; 
                border: 2px solid #0495b9; 
                border-radius: 10px; 
                cursor: pointer;
                margin-right: 270px;
        } */
        
        .ag-format-container {
            width: 1142px;
            margin: 0 auto;
            }

        .ag-courses_box {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 50px 0;

        }

        .ag-courses_item {
            -ms-flex-preferred-size: calc(33.33333% - 30px);
            flex-basis: calc(33.33333% - 30px);
            margin: 0 15px 30px;
            overflow: hidden;
            border-radius: 28px;
        }

        .ag-courses-item_link {
            display: block;
            padding: 30px 20px;
            background: linear-gradient(to bottom, #05c8d6, #8080D7);;
            overflow: hidden;
            position: relative;
        }
        
            .ag-courses-item_link:hover,
            .ag-courses-item_link:hover .ag-courses-item_date {
            text-decoration: none;
            color: #FFF;
            }
            .ag-courses-item_link:hover .ag-courses-item_bg {
            -webkit-transform: scale(10);
            -ms-transform: scale(10);
            transform: scale(10);
            }
            .ag-courses-item_title {
            min-height: 87px;
            margin: 0 0 25px;

            overflow: hidden;

            font-weight: bold;
            font-size: 30px;
            color: #FFF;

            z-index: 2;
            position: relative;
            }
            .ag-courses-item_date-box {
            font-size: 18px;
            color: #FFF;

            z-index: 2;
            position: relative;
            }
            .ag-courses-item_date {
            font-weight: bold;
            color: #f9b234;

            -webkit-transition: color .5s ease;
            -o-transition: color .5s ease;
            transition: color .5s ease
            }
            .ag-courses-item_bg {
            height: 128px;
            width: 128px;
            background-color: #f9b234;

            z-index: 1;
            position: absolute;
            top: -75px;
            right: -75px;

            border-radius: 50%;

            -webkit-transition: all .5s ease;
            -o-transition: all .5s ease;
            transition: all .5s ease;
            }
            .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
            background-color: #3ecd5e;
            }
            .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
            background-color: #e44002;
            }
            .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
            background-color: #952aff;
            }
            .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
            background-color: #cd3e94;
            }
            .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
            background-color: #4c49ea;
            }



            @media only screen and (max-width: 979px) {
            .ag-courses_item {
                -ms-flex-preferred-size: calc(50% - 30px);
                flex-basis: calc(50% - 30px);
            }
            .ag-courses-item_title {
                font-size: 24px;
            }
            }

            @media only screen and (max-width: 767px) {
            .ag-format-container {
                width: 96%;
            }

            }
            @media only screen and (max-width: 639px) {
            .ag-courses_item {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }
            .ag-courses-item_title {
                min-height: 72px;
                line-height: 1;

                font-size: 24px;
            }
            .ag-courses-item_link {
                padding: 22px 40px;
            }
            .ag-courses-item_date-box {
                font-size: 16px;
            }
            }

        .pagination-links {
            justify-content: center;
            display: flex;
            margin: 10px 0px 20px 0px;
        }

        .pagination-p{
            text-align: center;
        }

        /* END-ACADEMY PAGE CSS */

        .academy-container {
            display: flex;
            justify-content: center; /* Horizontally center the card */
            align-items: center; /* Vertically center the card */
            height: 100vh; /* Make the container cover the entire viewport */
        }

        .academy-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 30%;
            height: 90vh; /* Set height to cover the entire viewport */
            margin: 0; /* Remove margin */
        }

        .academy-card-header,
        .academy-card-body,
        .academy-card-footer {
            width: 100%;
        }

        .academy-title {
            font-size: 1.5rem;
            margin: 0;
        }

        .academy-location {
            color: #666;
        }

        .academy-description {
            margin-top: 0;
        }

        .academy-type,
        .academy-dates,
        .academy-times {
            margin-bottom: 5px;
        }

        .apply-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: white;
            color: black; /* White text color */
            border: 2px solid #6d6dce; /* Black border */
            border-radius: 10px; /* Rounded edges */
            cursor: pointer;
            transition: 
                transform 0.15s ease-out,
                color 0.15s ease-out,
                background-color 0.15s ease-out;
        }

        .apply-button:hover {
            transform: translate(5px, 5px);
            color: white;
            background: #6d6dce;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
    @yield('content')
</body>
</html>