<template>
  <div class="form-group">
    <label for="code">Unique Code</label>
    <input
      type="text"
      name="code"
      id="code"
      v-model="code"
      class="form-control decode-result mb-2"
      placeholder="Enter Unique Code..."
      autocomplete="off"
      readonly
      autofocus
    />
    <qrcode-stream @decode="onDecode" @init="onInit" />
  </div>
</template>

<script>
export default {
  name: "Reader",
  data: function () {
    return {
      code: "",
      error: "",
    };
  },

  methods: {
    onDecode(result) {
      this.code = result;
    },

    async onInit(promise) {
      try {
        await promise;
      } catch (error) {
        if (error.name === "NotAllowedError") {
          this.error = "ERROR: you need to grant camera access permisson";
        } else if (error.name === "NotFoundError") {
          this.error = "ERROR: no camera on this device";
        } else if (error.name === "NotSupportedError") {
          this.error = "ERROR: secure context required (HTTPS, localhost)";
        } else if (error.name === "NotReadableError") {
          this.error = "ERROR: is the camera already in use?";
        } else if (error.name === "OverconstrainedError") {
          this.error = "ERROR: installed cameras are not suitable";
        } else if (error.name === "StreamApiNotSupportedError") {
          this.error = "ERROR: Stream API is not supported in this browser";
        }
      }
    },
  },
};
</script>

<style scoped>
.error {
  font-weight: bold;
  color: red;
}
/* .wrapper {
  width: 350px;
  height: 350px;
} */
</style>