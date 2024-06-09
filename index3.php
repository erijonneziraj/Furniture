<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style5.css" />
    <title>Form Validator</title>
  </head>
  <body>
    <div class="container">
      <form id="form" class="form">
        <h2><span>Register</span> Here</h2>
        <div class="form-control">
          <label for="username">Username</label>
          <input
            type="text"
            id="username"
            placeholder="Enter username"
            class="form-txt"
          />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="email">Email</label>
          <input
            type="text"
            id="email"
            placeholder="Enter email"
            class="form-txt"
          />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            placeholder="Enter password"
            class="form-txt"
          />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password2">Confirm Password</label>
          <input
            type="password"
            id="password2"
            placeholder="Enter password again"
            class="form-txt"
          />
          <small>Error message</small>
        </div>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script>
      const form = document.getElementById("form");
      const username = document.getElementById("username");
      const email = document.getElementById("email");
      const password = document.getElementById("password");
      const password2 = document.getElementById("password2");

      function showError(input, message) {
        const formControl = input.parentElement;
        formControl.className = "form-control error";
        const small = formControl.querySelector("small");
        small.innerText = message;
      }

      function showSuccess(input, message) {
        const formControl = input.parentElement;
        formControl.className = "form-control success";
      }

      function getFieldName(input) {
        return input.id.charAt(0).toUpperCase() + input.id.slice(1);
      }

      function checkRequired(inputs) {
        inputs.forEach((input) => {
          if (input.value.trim() === "") {
            showError(input, `${getFieldName(input)} is required`);
          } else {
            showSuccess(input);
          }
        });
      }

      function checkLength(input, min, max) {
        if (input.value.length < min) {
          showError(
            input,
            `${getFieldName(input)} must be at least ${min} characters`
          );
        } else if (input.value.length > max) {
          showError(
            input,
            `${getFieldName(input)} must be less than ${max} characters`
          );
        } else {
          showSuccess(input);
        }
      }

      function checkEmail(input) {
        // Reference: https://stackoverflow.com/questions/46155/how-to-validate-an-email-address-in-javascript
        const re =
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(String(input.value.trim()).toLowerCase()))
          showSuccess(input);
        else showError(input, `${getFieldName(input)} is not valid`);
      }

      function checkPasswordMatch(input1, input2) {
        if (input1.value !== input2.value) {
          showError(input2, "Passwords do not match");
        }
      }

      form.addEventListener("submit", (e) => {
        e.preventDefault();
        checkRequired([username, email, password, password2]);
        checkLength(username, 3, 15);
        checkLength(password, 6, 25);
        checkEmail(email);
        checkPasswordMatch(password, password2);
      });
    </script>
  </body>
</html>
