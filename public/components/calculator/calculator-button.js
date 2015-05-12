(function (doc, app, undefined) {

  document.registerElement("calculator-button", {
	  prototype: Object.create(HTMLButtonElement.prototype, {
		  "createdCallback": { value: created },
		  "attachedCallback": { value: attached },
		  "detachedCallback": { value: detached },
		  "attributeChangedCallback": { value: changed }
	  }),
	  extends: "button"
  });

  function created () {
    this.addEventListener("click", clickHandler, false);
  }

  function attached () {
    // attached…
  }

  function detached () {
    this.removeEventListener("click", clickHandler);
  }

  function changed (attrName, oldVal, newVal) {
    console.log("this button changed ", attrName, oldVal, newVal);
  }

  function clickHandler (event) {
  	  if (event.target.dataset.operator) {
  	  	  resolveOperand(event.target.dataset.operator);
  	  } else {
  	  	  app.setFieldValue(event.target.textContent);
  	  }
  }

  function resolveOperand (data) {
	if (data === "clear") {
		return app.clear();
	}

	if (data === "calculate") {
		return app.equals();
	}

	app.setOperator(data);
  }


  function keyHandler (event) {

    var keys = getKeyMappings();

    if(keys.hasOwnProperty(event.charCode)) {
	keys[event.charCode]();
    }

    function handle (keyVal) {
	event.preventDefault();
	event.stopPropagation();

	if (typeof keyVal !== "number") {
		app.setOperator(keyVal);
	} else {
		app.setFieldValue(keyVal);
	}
    }

    function getKeyMappings () {
	    return {
		    "49": handle.bind(null, 1),
		    "50": handle.bind(null, 2),
		    "51": handle.bind(null, 3),
		    "52": handle.bind(null, 4),
		    "53": handle.bind(null, 5),
		    "54": handle.bind(null, 6),
		    "55": handle.bind(null, 7),
		    "56": handle.bind(null, 8),
		    "57": handle.bind(null, 9),
		    "48": handle.bind(null, 0),
		    "99": handle.bind(null, "c"),
		    "42": handle.bind(null, "multiply"),
		    "45": handle.bind(null, "subtract"),
		    "47": handle.bind(null, "divide"),
		    "43": handle.bind(null, "add"),
		    "61": handle.bind(null, "=")
	    };
    }
  }

  document.addEventListener("keypress", keyHandler, true);

}(document._currentScript.ownerDocument, heroLaraCalculator));
