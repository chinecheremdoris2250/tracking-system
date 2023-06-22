<!DOCTYPE html>
<html lang="en">
<style>
  #scroll-container {
    /* border: 3px solid black; */
    width: 100%;
    height: 50%;
    padding: 30px;
    overflow: hidden;
  }

  #scroll-text {
    text-align: right;
    overflow: hidden;
    font-size: 40px;
    font-weight: 700;
    /* animation properties */
    -moz-transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);

    -moz-animation: my-animation 15s linear infinite;
    -webkit-animation: my-animation 15s linear infinite;
    animation: my-animation 15s linear infinite;
  }

  /* for Firefox */
  @-moz-keyframes my-animation {
    from {
      -moz-transform: translateX(100%);
    }

    to {
      -moz-transform: translateX(-100%);
    }
  }

  /* for Chrome */
  @-webkit-keyframes my-animation {
    from {
      -webkit-transform: translateX(100%);
    }

    to {
      -webkit-transform: translateX(-100%);
    }
  }

  @keyframes my-animation {
    from {
      -moz-transform: translateX(100%);
      -webkit-transform: translateX(100%);
      transform: translateX(100%);
    }

    to {
      -moz-transform: translateX(-100%);
      -webkit-transform: translateX(-100%);
      transform: translateX(-100%);
    }
  }
</style>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div id="scroll-container">
    <h2 id="scroll-text" style="color: #3f0097;">STUDENT <span style="color: #5500cb;">INFORMATION TRACKING</span>   SYSTEM</h2>
    </>
</body>

</html>