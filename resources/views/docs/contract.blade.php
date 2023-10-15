<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Договір</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Roboto:wght@100;300;400;500;700&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}
    <style>

        body {
            font-family: Roboto, serif;
        }
        h5 {
            margin: 0;
            padding: 0;
        }
        h4 {
            border-bottom: rgba(0, 0, 0, 0.50) 1px solid;
            padding-bottom: 10px;
            margin-bottom: 0;
        }

        h3 {
            font-weight: 500;
            margin: 0;
        }

        p {
            padding: 0;
            margin: 0;
            font-size: 12px;
        }
        .container {
            text-align: center;
        }

        .title-block {
            display: block;
            text-align: center;
            border-bottom: rgba(0, 0, 0, 0.50) 1px solid;
            width: 700px;
            height: 127px;
        }

        .title-left {
            width: 300px;
            float: left;
            text-align: right;
        }

        .title-right {
            width: 300px;
            float: left;
            text-align: left;
        }

        .title-center {
            float: left;
            width: 100px;
        }

        .content {
            height: 500px;
        }

        .header {
            margin-top: 20px;
            margin-bottom: 0;
        }

        .header-description {
            font-weight: 500;
            font-size: 14px;
        }

        .subheader {
            margin-top: 30px;
            font-size: 12px;
            font-weight: 500;
        }

        .date-number {
            float: left;
            text-align: left;
            margin-bottom: 0;
        }

        .city {
            text-align: right;
            float: right;
            margin-bottom: 0;
        }

        .par-1 {
            margin-top: 0;
            text-align: left;
            text-indent: 30px;
        }

        .par-1 p {
            font-size: 12px;
        }

        .contract-part {
            margin-top: 30px;
        }

        .contract-part p {
            text-align: left;

            text-indent: 30px;

        }

    </style>

</head>

<body>
<div class="container">
    <div class="title-block">
        <div class="title-left">
            <h4>
                ПРАВОВИЙ АЛЬЯНС<br>
                НАУКОВЦІВ-ПРАКТИКІВ<br>
                «БОРИФЕН»
            </h4>
            <p><strong>Web:</strong> www.borisfen.net</p>
        </div>
        <div class="title-center"></div>
        <div class="title-right">
            <h4>
                LEGAL ALLIANCE <br>
                SCIENTIST PRACTITIONERS
                «BORISFEN»
            </h4>
            <p><strong>E-mail:</strong> dnipro@borisfen.net</p>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <h3>ДОГОВІР</h3>
            <p class="header-description">про надання правової допомоги</p>
        </div>
        <div class="subheader">
            <div class="date-number">{{ \Carbon\Carbon::now()->translatedFormat('\«d\» F Y') }} року № 11/ДогП/01/2023</div>
            <div class="city">м. Дніпро</div>
        </div>
        <div class="par-1">
            <p>Правовий Альянс Науковців-Практиків «Борисфен» (ЄДРПОУ 39651357),
                в особі її голови Гильт Галини Григорівни, яка діє на підставі Статуту та
                адвокат Торубаров Андрій Володимирович, який займається адвокатською діяльністю на
                підставі Свідоцтва про право на заняття адвокатською діяльністю №1866,
                виданого Дніпропетровською КДКА 16 серпня 2008 року, (далі - Виконавець), з однієї сторони,
                та {{ $client->surname }} {{ $client->name }} {{ $client->father_name }}, {{ $birthdate->translatedFormat('d F Y') }} року народження, РНОКПП: {{ $client->tin_code }},
                (далі - Клієнт) з другої сторони, уклали даний Договір про правову допомогу
                (надалі – Договір) про наступне.</p>
        </div>

        <div class="contract-part">
            <h5>1. ПРЕДМЕТ ДОГОВОРУ</h5>
            <p>1. «Клієнт» доручає, а «Виконавець» бере на себе зобов&#39;язання здійснити функції
                (захисника) представника Самойленка Олексія Сергійовича, у справі про
                адміністративне правопорушення, передбачене ст.124 КУпАП та ст.122-4 КУпАП в Ленінському
                районному суді м. Дніпропетровська та Дніпровському апеляційному суді.</p>
        </div>

        <div class="contract-part">
            <h5>2. ПРАВА ТА ОБОВ’ЯЗКИ СТОРІН</h5>
            <p>2.1. Адвокат зобов’язується:</p>
            <p>2.1.1. Надавати правову допомогу, в том числі, за окремими дорученнями Клієнта.</p>
            <p>2.1.2. Представляти права і законні інтереси Клієнта в органах державної влади, місцевого
                самоврядування, на підприємствах, установах, організаціях всіх форм власності та
                підпорядкування, судах України, правоохоронних органах та здійснювати професійну діяльність
                Адвоката згідно з умовами цього договору з усіма правами представника, які передбачені чинним
                в України законодавством.</p>
            <p>2.1.3. Інші послуги, визначені ст.19 ЗУ «Про адвокатуру та адвокатську діяльність».</p>
            <p>2.2. Права адвоката:</p>
            <p>2.2.1. Представляти інтереси клієнта та приймати участь у судових засіданнях, розробити
                правову позицію у справі, скласти позовну заяву, підготувати позовні матеріали та подати їх в суд,
                знайомитися з матеріалами справи, робити з них витяги, знімати копії з документів,
                долучених до справи, одержувати копії рішень, ухвал, брати участь у судових засіданнях,
                подавати докази, брати участь у дослідженні доказів, задавати питання іншим особам, які беруть
                участь у справі, а також свідкам, експертам, спеціалістам, заявляти клопотання та відводи,
                давати усні та письмові пояснення судові, подавати свої доводи, міркування щодо питань, які
                виникають під час судового розгляду, і заперечення проти клопотань, доводів і міркувань
                інших осіб, знайомитися з журналом судового за сідання, знімати з нього копії та подавати
                письмові зауваження з приводу його неправильності чи неповноти, прослуховувати запис
                фіксування судового засідання технічними засобами, робити з нього копії, подавати письмові
                зауваження з приводу його неправильності чи неповноти, оскаржувати рішення і ухвали суду,
                змінювати підставу або предмет позову, збільшувати або зменшувати розмір позовних вимог,
                відмовитись від позову, визнати позов повністю або частково, пред’явити зустрічний позов,
                укладати мирову угоду, користуватися іншими процесуальними правами встановленими ЦПК,
                КПК, КАСУ тощо.</p>
            <p>2.2.2. Адвокат має право збирати відомості про факти, які можуть бути використанні як
                докази у цивільних, господарських, адміністративних справах.</p>
        </div>
{{--maybe footer--}}
        <div class="contract-part">

        </div>
    </div>
</div>
</body>
</html>
