<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minulyo Cake</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
</head>

<body>
    <main>
        <section class="intro-container">
            <h1>Selamat Datang!</h1>
            <p>Setiap gigitan menghadirkan kelezatan yang tak terlupakan. Dari lembutnya lapisan hingga aroma menggoda,
                setiap potongan adalah kenikmatan yang tiada tara. Jangan lewatkan untuk mencicipi kelezatan ini,
                lihatlah beragam produk kami di website resmi kami!</p>
            <a href="https://wa.me/6285852760103" class="cta-whatsapp">Pesan Sekarang!</a>
        </section>

        <section class="product-list-container" id="produk">
            @foreach ($products as $product)
                <div class="product-card">
                    @if ($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" width="50"
                            height="250">
                    @endif
                    <div class="details">
                        <label>{{ $product->nama }}</label>
                        <h1>Rp.{{ $product->harga }}</h1>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}">More Detail</a>
                </div>
            @endforeach
        </section>
    </main>
</body>

<style>
    * {
        padding: 0;
        margin: 0;
        font-family: "Poppins", sans-serif;
        scroll-behavior: smooth;
        text-decoration: none;
    }

    body {
        max-width: 1200px;
        margin: auto;
    }

    header {
        position: sticky;
        top: 20px;
    }

    main {
        margin: 2.5em;
        padding: 0em 2.5em 0em 2.5em;
    }

    .intro-container,
    .product-card {
        position: relative;
        padding: 10px;
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .intro-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        text-align: center;
        margin-bottom: 20px;
    }

    .product-list-container {
        margin-top: 1.5rem;
        padding: 2.5rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .product-card {
        width: calc(33.33% - 20px);
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
        width: 100%;
        border-radius: 10px;
    }

    .product-card .details {
        padding-top: 10px;
    }

    .product-card h2 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .product-card p {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .cta-whatsapp {
        background-color: #25d366;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        max-width: fit-content;
        text-decoration: none;
    }
</style>

<script>
    gsap.from(".intro-container", { duration: 1, opacity: 0, y: -50, ease: "power2.out" });
</script>

</html>