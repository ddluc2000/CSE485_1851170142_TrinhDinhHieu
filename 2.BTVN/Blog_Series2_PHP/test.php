<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    *{
      margin-bottom:5px;
    }
  </style>
  </head>
  <body>
    
    <form action="test.php" method="post">
    Account:
    <input type="text" name="txtUser">
    <br>
    Password:
    <input type="text" name="txtPass">
    <br>
    Nick Name:
    <input type="text" name="txtName">
    <br>
    Prefered Time:
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="Time" autocomplete="off" checked>AM
        </label>
        <br>
        <label class="btn btn-primary">
            <input type="radio" name="Time" autocomplete="off">PM
        </label>
    </div>
    Classes takes
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="Si503" value="checkedValue">Si503
        <br>
        <input type="checkbox" class="form-check-input" name="Si504" value="checkedValue">Si504
        <br>
        <input type="checkbox" class="form-check-input" name="Si505" value="checkedValue">Si505
        <br>
        
      </label>
    </div>
    <br>
    
    <div class="form-group">
      <label >Which Soda:</label>
      <select class="form-control" name="Soda">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
    <br>
    
    <div class="form-group">
      <label >Which Snack:</label>
      <select class="form-control" name="Snack">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
    <br>
    <h3>Tell us yourself</h3>
    <textarea name="Tell" cols="30" rows="10" placeholder="Viet gi day..."></textarea>
    <br>
    
    <div class="form-group">
    <h3>Which are awesome</h3>
      <select class="form-control" multiple="multiple" name="multi">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
    <br>
    <button type="submit">Submit</button>
    <button>Escape</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>