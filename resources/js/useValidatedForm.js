import intus from "intus";

export default function(form, rules) {
   return new Proxy(form, {
    get(target, prop) {
      // Intercept `submit` calls
      if (prop === "post") {
        form.clearErrors();

        const validation = intus.validate(form.data(), rules);

        if (!validation.passes()) {
          form.setError(validation.errors());

          // If validation fails return a function that does nothing
          return () => {};
        }
      }

      return target[prop];
    },
  });
}
