<div id="write-review-box" class="white-boxes">
<form action="Individual_Result_Page.php?location=<?php echo(urlencode($_GET['location']))?>" method="post">
    <h2>Write your reivew:</h2>
        <?php 
        if($submitted && sizeOf($errors) > 0 ){
            if(isset($errors['reviewDescription'])){
                echo("<span class=\"error-msg\">".$errors['reviewDescription']."</span>");
            }else if(isset($errors['rating'])){
                echo("<span class=\"error-msg\">".$errors['rating']."</span>");
            }
        }
        ?>
        <div>
            <span onclick="ratingChoose(this)"><i id="one-star" class="fa fa-star-o"></i></span>
            <span onclick="ratingChoose(this)"><i id="two-star" class="fa fa-star-o"></i></span>
            <span onclick="ratingChoose(this)"><i id="three-star" class="fa fa-star-o"></i></span>
            <span onclick="ratingChoose(this)"><i id="four-star" class="fa fa-star-o"></i></span>
            <span onclick="ratingChoose(this)"><i id="five-star" class="fa fa-star-o"></i></span>
            <span><input type="text" id="rating" name="rating" value="0"  readonly/>/5</span>
        </div>
        <textarea name="reviewDescription" rows="10" cols="85"></textarea>
        <br>
        <div id="publish-btn-container">
            <div id="publish-locs">
                <button type="submit" id="publish-btn">Publish Your Review</button>
            </div>
        </div>
</form>
</div>