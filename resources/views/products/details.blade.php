<!DOCTYPE html>
<html>

<head>
    <title>Minulyo Cake</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
</head>

<body>
    <div class="container" id="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-info">
                    <h2>{{ $product->nama }}</h2>
                    <p>Harga: Rp.{{ $product->harga }}</p>
                    @if ($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="comment-container">
                    @if ($product->comments->isEmpty())
                        <p>Belum ada komentar</p>
                    @else
                        @foreach ($product->comments as $comment)
                            <div class="comment">
                                <p class="author">{{ $comment->name ?? 'Anonymous' }}</p>
                                <p>{{ $comment->content }}</p>
                                <p class="date">{{ $comment->created_at->format('F d, Y H:i') }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="comment-form" style="margin-right: 20px;"> <!-- Menambahkan margin-right -->
                    <h2>Komentar</h2>
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="content">Ulasan</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            opacity: 0;
            margin: 25px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            /* Tambahkan margin bawah */
        }

        .product-info {
            padding: 20px;
            /* Tambahkan padding */
            border: 1px solid #ddd;
            /* Tambahkan border */
            border-radius: 5px;
            /* Tambahkan border radius */
            background-color: #fff;
            /* Atur warna latar belakang */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan */
        }

        .product-info img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 5px;
            /* Tambahkan border radius untuk gambar */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan untuk gambar */
        }


        .comment-container {
            margin-top: 30px;
            max-height: 450px;
            /* Atur tinggi maksimum */
            overflow-y: auto;
            /* Tambahkan overflow untuk scrolling */
        }

        .comment {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .comment .author {
            font-weight: bold;
        }

        .comment .date {
            color: #666;
        }

        .comment-form {
            padding: 20px;
            /* Tambahkan padding */
            border: 1px solid #ddd;
            /* Tambahkan border */
            border-radius: 5px;
            /* Tambahkan border radius */
            background-color: #fff;
            /* Atur warna latar belakang */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Tambahkan bayangan */
        }

        /* Menyusun komentar dan form menggunakan flexbox */
        .col-md-6 {
            display: flex;
            flex-direction: column;
        }

        .comment-container {
            flex-grow: 1;
        }
    </style>

    <script>
        gsap.from(".product-info", { duration: 1, opacity: 0, y: 100, ease: "power2.out" });
        gsap.from(".product-info img", { duration: 1, opacity: 0, scale: 0.5, ease: "power2.out", delay: 0.5 });
        gsap.to(".container", { duration: 1, opacity: 1, delay: 0.5, ease: "power2.out" });

        gsap.utils.toArray('.comment').forEach((comment, index) => {
            gsap.from(comment, { duration: 1, opacity: 0, x: 20, ease: "power2.outs", delay: 0.5 + index * 0.25 });
        });
    </script>


</body>

</html>