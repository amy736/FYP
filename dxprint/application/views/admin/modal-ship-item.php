<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form class="form-add-product">
            <input type="hidden" name="tempkey" value="<?=$tempkey?>">
            <div class="wg-box mb-60">
                <fieldset class="name">
                    <div class="body-title mb-10">Tracking Number <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter Tracking Number" id="track-no-id-pass" tabindex="0" aria-required="true" required="">
                </fieldset>
                <fieldset class="name">
                <center>
                    <button class="tf-button" type="submit" onclick="proceedToShip('<?=$id?>');">Proceed</button> 
                    <br>
                    <button class="tf-button" type="submit" onclick='$("#shipped-item-modal").modal("hide");'>Close</button>
                </center>
            </fieldset>
                
            </div>
        </form>
    </div>
</div>