<style> 
    .unresolevd
    {
      margin-left: 50px;
      color: #D2691E;
      font-size: 16px;
    }
  /* The container */
  .container 
  {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .container input 
  {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark 
  {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #999;
    border-radius: 50%;
  }

  /* On mouse-over, add a grey background color */
  .container:hover input ~ .checkmark 
  {
    background-color: #ccc;
  }

  /* When the radio button is checked, add a blue background */
  .container input:checked ~ .checkmark 
  {
    background-color: #008B8B;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after 
  {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the indicator (dot/circle) when checked */
  .container input:checked ~ .checkmark:after 
  {
    display: block;
  }

  /* Style the indicator (dot/circle) */
  .container .checkmark:after 
  {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }
    .multi
    {
        color: blue;
    }
    .null
    {
        color: red;
    }

    .unresolevd
    {
      margin-left: 50px;
      color: #D2691E;
      font-size: 16px;
    }
</style>