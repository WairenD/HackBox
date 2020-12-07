<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="logodiv">
      <img width="100" height="100" src="logo.png" alt="logo">
    </div>
    <div class="center">
      <form runat="server" method="post">
        <input class="txtinput" type="password" name="password" >
        <input class="btn" type="submit" name="submit" value="Submit">
      </form>
    </div>
    <div class="text">
      <h1>Objective</h1>
    </div>
    <div class="text">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget commodo est. Ut justo ex, dignissim a ligula posuere, bibendum rhoncus ligula. Mauris vitae mi rutrum, facilisis leo quis, semper magna. Cras a mauris tellus. Aliquam ut lobortis ex. Sed elementum consectetur suscipit. Phasellus id lorem ultrices, bibendum elit quis, rhoncus libero.

Proin in turpis urna. Proin eleifend hendrerit lorem eu posuere. Nam nec lacus lorem. Vivamus quam velit, tincidunt in feugiat vitae, mattis at urna. Nam dapibus facilisis rhoncus. Quisque faucibus leo purus, in faucibus arcu porttitor a. Aliquam scelerisque, leo bibendum pretium viverra, leo dolor sodales est, sed sagittis ligula mauris hendrerit massa.

Suspendisse dapibus, augue ut dignissim fringilla, nisi leo laoreet sem, eu ullamcorper quam nunc quis nulla. Integer eget enim tristique, semper ligula eu, bibendum nisl. Proin ante elit, vulputate nec tortor in, pretium ultricies lorem. Nam quis dolor ut elit ornare semper. Curabitur nec lacus odio. Suspendisse eget porttitor mauris. Nullam vel sem accumsan, vestibulum ante vitae, euismod dolor. Duis vitae aliquet justo, imperdiet euismod enim. Aenean dapibus ligula non odio fringilla luctus. Donec eget lacus dolor. Etiam sit amet ipsum eu ante sollicitudin mollis quis vestibulum dolor. Quisque tristique purus non nisi mattis, non venenatis mauris sodales. Maecenas malesuada ac elit eu bibendum.

Integer sem leo, pretium feugiat risus at, porta tempus purus. Pellentesque fermentum dui ac neque ultrices, hendrerit molestie dolor ornare. Suspendisse luctus purus id ultricies mollis. Nunc sollicitudin suscipit ex, id vestibulum risus imperdiet sed. Cras ex augue, ultrices sed suscipit at, scelerisque sed ex. Aenean elementum dolor eleifend lectus pulvinar, in elementum velit finibus. Maecenas faucibus nisi purus, at sodales elit suscipit sit amet. Nam at nisi in felis sagittis faucibus quis vestibulum ligula.

Aliquam lorem felis, fringilla ut tincidunt eu, ornare in elit. Cras sagittis, est sed pellentesque semper, urna justo suscipit magna, et commodo ligula enim ac metus. In finibus eu justo vitae tincidunt. Vestibulum molestie eget dolor consectetur vehicula. Sed cursus metus nisl. Etiam a eleifend nulla. Maecenas elit orci, egestas eu ex eu, dapibus bibendum metus.
      </p>
    </div>
    <?php
    if(isset($_POST['submit'])){
      if(!empty($_POST['password'])){
          if($_POST['password']=="123"){
            //header('Location: '.$nextPage);
          }
          else{

              echo "<span>Login details are incorrect!</span>";
            }

      }else{
        echo "<span>Please fill in all the details!</span>";
      }
    }
     ?>
  </body>
</html>
