<form action="" method="POST">
  <input type="number" name="product_id" id="" value="{{ $product_id }}" hidden disabled>
  <input type="number" name="user_id" id="" value="{{ $user_id }}" hidden disabled>
  <label for="">Rating</label>
  <input type="number" name="rating" id="" class="form-control" required>
  <label for="">Commnet</label>
  <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
</form>
