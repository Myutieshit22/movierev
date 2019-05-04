<p class="mb-0"><?php echo 'Rating : '.$ratingRounded.' our of 5 stars'; ?></p>
<div class="rate">

    <input type="radio" id="star5" name="rate" value="5" disabled
    <?php if($ratingRounded == 5) echo 'checked'; ?> />
    <label for="star5" title="Very Good">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" disabled
    <?php if($ratingRounded == 4) echo 'checked'; ?>/>
    <label for="star4" title="Good">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" disabled
    <?php if($ratingRounded == 3) echo 'checked'; ?> />
    <label for="star3" title="Not Bad/Standard">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" disabled
    <?php if($ratingRounded == 2) echo 'checked'; ?>>
    <label for="star2" title="Bad">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" disabled
    <?php if($ratingRounded == 1) echo 'checked'; ?> />
    <label for="star1" title="Very Bad">1 star</label>
  </div>
  <br><br>