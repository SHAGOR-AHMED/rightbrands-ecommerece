function phoneTest(a) {
    var b = /^(\+88|88|)(\d{11})$/;
    return b.test(a)
    }
function amountTest(a) {
    var b = /^[1-9][0-9]+$/;
    return b.test(a)
    }
function showError(a, b) {
    alert(b);
    a.focus();
    return false
}
function validate(a, b, c) {
    var d = document.getElementById("phone").value;
    var e = document.getElementById("type");
    var f = e.selectedIndex;
    if (d == "")
        return showError(a, "MobileNo cannot be empty");
    var g = document.getElementById("amount").value;
    if (g == "")
        return showError(b, "Flexi amount cannot be empty");
    if (f == 0 && g > 1e3)
        return showError(b, "Prepaid flexi amount cannot be greater than 1000.");
    var h = phoneTest(d);
    if (h == true) {
        if (d.length > 11)
            d = d.substring(d.length - 11);
        var i = d.substring(0, 3);
        if (i == "017" || i == "015" || i == "016" || i == "019" || i == "018" || i == "011") {
            if (amountTest(g)) {
                return actionConfirmation("You are sending Tk." + g + " to mobile number " + d + ". Please Make sure- Phone Number, Amount and Type is Correct. Click OK to send or Cancel to Cancel")
                } else
                return showError(b, "Invalid amount")
            } else
            return showError(a, "Invalid mobileno")
        } else
        return showError(a, "Invalid mobileno")
    }
function validateBalance(a, b, c) {
    var d = b.value;
    if (d == "")
        return showError(b, "Amount cannot be empty.");
    if (d < 10)
        return showError(b, "Amount cannot be less than 10.");
    if (amountTest(d)) {
        if (c.value == "add")
            return actionConfirmation("Tk." + d + ' is being adding to "' + a.value + '". Please confirm...');
        else
            return actionConfirmation("Tk." + d + ' is being cancelling from "' + a.value + '". Please confirm...')
        } else
        return showError(b, "Invalid amount")
    }
function emptyvalidation(entered, alertbox) {
    with(entered) {
        if (value.length == 0 || value == null || value == "") {
            if (alertbox) {
                alert(alertbox)
                }
            return false
        } else {
            return true
        }
    }
}
function charactervalidation(entered, alertbox) {
    with(entered) {
        j = 0;
        for (i = 0; i < value.length; i++) {
            if (value.charAt(i) >= "a" && value.charAt(i) <= "z" || value.charAt(i) >= "A" && value.charAt(i) <= "Z" || value.charAt(i) == "_" || value.charAt(i) == "." || value.charAt(i) == " ")
                j++
        }
        if (j == value.length)
            return true;
        else {
            if (alertbox)
                alert(alertbox);
            return false
        }
    }
}
function firstcharactervalidation(entered, alertbox) {
    with(entered) {
        j = 0;
        if (value.charAt(0) >= "a" && value.charAt(0) <= "z" || value.charAt(0) >= "A" && value.charAt(0) <= "Z") {
            j++
        }
        if (j > 0) {
            return true
        } else {
            if (alertbox)
                alert(alertbox);
            return false
        }
    }
}
function equalvalidation(a, b, c) {
    if (a.value == b.value) {
        return true
    } else {
        if (c) {
            alert(c)
            }
        return false
    }
}
function rangevalidation(entered, alertbox, mn, mx) {
    with(entered) {
        if (value.length < mn || value.length > mx) {
            if (alertbox) {
                alert(alertbox)
                }
            return false
        } else {
            return true
        }
    }
}
function listselectionvalidation(a, b) {
    if (a.value == "") {
        if (b) {
            alert(b)
            }
        return false
    } else {
        return true
    }
}
function selectionvalidation(a, b) {
    if (a.value == "") {
        if (b) {
            alert(b)
            }
        return false
    } else {
        return true
    }
}
function limitvalidation(entered, min, max, alertbox) {
    with(entered) {
        if (value < min || value > max) {
            if (alertbox) {
                alert(alertbox)
                }
            return false
        } else {
            return true
        }
    }
}
function numericvalidation(a, b) {
    j = 0;
    for (i = 0; i < a.value.length; i++) {
        if (a.value.charAt(i) >= "0" && a.value.charAt(i) <= "9") {
            j++
        }
    }
    if (j == a.value.length) {
        return true
    } else {
        if (b) {
            alert(b)
            }
        return false
    }
}
function alphanumericvalidation(entered, alertbox) {
    with(entered) {
        j = 0;
        for (i = 0; i < value.length; i++) {
            if (value.charAt(i) >= "a" && value.charAt(i) <= "z" || value.charAt(i) >= "A" && value.charAt(i) <= "Z" || value.charAt(i) >= "0" && value.charAt(i) <= "9" || value.charAt(i) == "_" || value.charAt(i) == "." || value.charAt(i) == "~" || value.charAt(i) == "$" || value.charAt(i) == "!" || value.charAt(i) == "*" || value.charAt(i) == "@")
                j++
        }
        if (j == value.length)
            return true;
        else {
            if (alertbox)
                alert(alertbox);
            return false
        }
    }
}
function emailvalidation(entered, alertbox) {
    with(entered) {
        j = 0;
        for (i = 0; i < value.length; i++) {
            if (value.charAt(i) >= "a" && value.charAt(i) <= "z" || value.charAt(i) >= "A" && value.charAt(i) <= "Z" || value.charAt(i) >= "0" && value.charAt(i) <= "9" || value.charAt(i) == "_" || value.charAt(i) == "." || value.charAt(i) == "@")
                j++
        }
        if (j == value.length)
            return true;
        else {
            if (alertbox)
                alert(alertbox);
            return false
        }
    }
}
function zerovalidation(entered, alertbox) {
    with(entered) {
        if (value <= 0) {
            if (alertbox) {
                alert(alertbox)
                }
            return false
        } else {
            return true
        }
    }
}
function actionConfirmation(a) {
    var b = confirm(a);
    if (b == true)
        return true;
    else
        return false
}