<div class="parent-middle w3-container">
    <div class="w3-card w3-margin w3-center w3-round-large w3-padding half">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="type" id="type" value="<?php echo isset($_GET['id']) ? "true" : "false" ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <label for="title">
                <p>Title</p>
                <input type="text" name="title" placeholder="Title" required id="title"
                       class="w3-input">
            </label>
            <label for="desc">
                <p>description</p>
                <input type="text" name="desc" placeholder="Description" required id="desc"
                       class="w3-input">
            </label>
            <label for="location">
                <p>Location</p>
                <input type="text" name="location" placeholder="Paris, France" required id="location" class="w3-input">
            </label>
            <label for="price">
                <p>Price</p>
                <input type="text" name="price" placeholder="5€" required id="price" class="w3-input">
            </label>
            <div>
                <img alt="" src="<?php echo $racine."images/ads/img.png" ?>">
                <label for="image">
                    Upload Image
                    <input type="file" name="image" placeholder="Image" required id="image" class="w3-input">
                </label>
            </div>
            <button type="submit" class="w3-btn w3-round w3-theme-dark w3-margin" name="adForm" id="adForm">Change/Create</button>
        </form>
    </div>
</div>