<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form id="testForm" action="test2" class="" method="get">

      <input type="checkbox" name="a[]" value="1">Ini 1</input>
      <input type="checkbox" name="a[]" value="2">Ini 2</input>
      <input type="checkbox" name="a[]" value="3">Ini 3</input>
      <input type="checkbox" name="a[]" value="4">Ini 4</input>
      <input type="checkbox" name="a[]" value="5">Ini 5</input>
      <input type="checkbox" name="a[]" value="6">Ini 6</input>
      <input type="hidden" name="_token" value="{{csrf_token()}}" />
      <button type="submit" name="submit">Submit</button>
    </form>


    <script>

    </script>
  </body>
</html>
