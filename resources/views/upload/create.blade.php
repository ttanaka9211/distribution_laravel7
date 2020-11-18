<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <label>
            タイトル
        </label>
        <input id="title" name="title" type="text">
        <label>
            本文
        </label>
        <textarea id="body" name="body" ></textarea>
        <p>
            <input type="file" name="datafile">
        </p>
        <p>
            <input type="submit" value="送信する">
        </p>
    </form>
</body>
</html>
