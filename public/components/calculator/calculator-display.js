(function (doc, app, undefined) {

  document.registerElement("calculator-display", {
	  prototype: Object.create(HTMLInputElement.prototype, {
		  "createdCallback": { value: created },
		  "attachedCallback": { value: attached },
		  "detachedCallback": { value: detached },
		  "attributeChangedCallback": { value: changed }
	  }),
	  extends: "input"
  });

  function created () {
  	  app = app || {};
  	  app.field = this;
  	  this.oninput = onInput;
  }

  function attached () {
    // attached…
  }

  function detached () {
  	  //
  }

  function changed (attrName, oldVal, newVal) {
    console.log("this input changed ", attrName, oldVal, newVal);
  }

  function clickHandler (event) {
  	  //
  }

  function onInput (event) {
  	  console.log("changed: ", event.target.value);
  	  app.setFieldValue(event.target.value);
  }

}(document._currentScript.ownerDocument, heroLaraCalculator));
