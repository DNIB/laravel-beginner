<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> 新增評論 </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <style>

        </style>
    </head>
    <body>
        <div><form action="/comments/delete" method="post">
            {{ csrf_field() }}
            <?php
                $isCommentsValid = count($comments);
                if ($isCommentsValid) {
            ?>

            <label for='select_id'> 選取刪除評論 </label>
            <select name='select_id'>
            
            <?php
                foreach ($comments as $comment) {
                $id = $comment->id;
                $student = $comment->student->getFullNameAttribute();
                $course = $comment->course->name;
                $score = $comment->score;
                $comm = $comment->comment;
                $str = "評論者：".$student." 課程：".$course." 分數：".$score." 內容：".$comm;
            ?>

            <option value="{{ $id }}">{{ $str }}</option>

            <?php
                }
            ?>

            </select>

            <?php
                } else {
                echo "<h1>Error: No Comment Exist</h1>";
            }
            ?>
            <input type='submit' value='送出表單'>
        </form></div>

        <div>
            <a href="/"> 返回首頁 </a>
        </div>
    </body>
</html>