<!DOCTYPE html>
<html>

<head>
    <title>Minulyo Cake</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Edit Product</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $product->nama) }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $product->harga) }}" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar">
                @if ($product->gambar)
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" width="100">
                @endif
            </div>
            <div>
                <button type="submit">Update Product</button>
            </div>
        </form>

        <div class="comments">
            <h2>Komentar</h2>
            @if($product->comments->isNotEmpty())
                <ul>
                    @foreach ($product->comments as $comment)
                        <li class="comment-item">
                            <div class="user-name">{{ $comment->name }}</div>
                            {{ $comment->content }}
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Tidak ada komentar.</p>
            @endif
        </div>

        <a class="back-link" href="{{ route('products.index') }}">Back to Product List</a>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            /* Membuat kontainer berada di tengah horizontal */
            align-items: center;
            /* Membuat kontainer berada di tengah vertikal */
            min-height: 100vh;
        }

        .container {
            width: 80%;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #5cb85c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .comments {
            margin-top: 20px;
        }

        .comments ul {
            list-style-type: none;
            padding: 0;
        }

        .comments li {
            background: #f9f9f9;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .comments .user-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comments form {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        // Animasi GSAP untuk halaman
        gsap.from(".container", { duration: 0.8, y: -50, opacity: 0, ease: "power2.out" });
        gsap.from("h1, h2", { duration: 0.6, opacity: 0, delay: 0.3, stagger: 0.2, ease: "power2.out" });
        gsap.from(".form-group", { duration: 0.6, opacity: 0, delay: 0.8, stagger: 0.2, ease: "power2.out" });
        gsap.from(".comments .comment-item", { duration: 0.6, x: -50, opacity: 0, delay: 1.2, stagger: 0.2, ease: "power2.out" });
        gsap.from("button", { duration: 0.6, scale: 0, delay: 1.6, ease: "power2.out" });
        gsap.from(".back-link", { duration: 0.6, opacity: 0, delay: 2, ease: "power2.out" });
    </script>
</body>

</html>