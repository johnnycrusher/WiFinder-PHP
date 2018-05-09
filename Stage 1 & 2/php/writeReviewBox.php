<div id="write-review-box" class="white-boxes">
<form action="indivdual_Results_Page.php" method="post">
    <h2>Write your reivew:</h2>
        <div>
            <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="one-star" class="fa fa-star-o"></i></span>
            <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="two-star" class="fa fa-star-o"></i></span>
            <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="three-star" class="fa fa-star-o"></i></span>
            <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="four-star" class="fa fa-star-o"></i></span>
            <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="five-star" class="fa fa-star-o"></i></span>
        </div>
        <textarea rows="10" cols="85"></textarea>
        <br>
        <div id="publish-btn-container">
            <div id="publish-locs">
                <button id="publish-btn">Publish Your Review</button>
            </div>
        </div>
</form>
</div>