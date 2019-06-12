<template>
  <div class="input">
    <input
      autocomplete="off"
      class="form-control"
      :class="[
        statusCode === 1 ? 'valid' : '',
        statusCode === 0 ? 'invalid' : ''
      ]"
      :id="id"
      type="text"
      :disabled="disabled"
      v-model="input"
      @blur="emitFocus(false)"
      @focus="emitFocus(true)"
      @input="emitInput($event.target.value)"
    />

    <label
      :for="id"
      :class="[isFocus ? 'active' : '']"
      v-if="label"
      v-html="label"
    ></label>

    <span class="form-text" v-if="helperText" v-html="helperText"></span>
  </div>
</template>

<script>
export default {
  props: {
    disabled: {
      type: Boolean,
      default: false
    },
    helperText: {
      type: [Boolean, String],
      default: false
    },
    id: {
      type: String,
      required: true
    },
    label: {
      type: [Boolean, String],
      default: false
    },
    statusCode: {
      type: Number,
      default: -1
    },
    value: {
      type: [Number, String],
      default: ""
    }
  },

  data: () => ({
    input: "",
    inputFocus: false
  }),

  computed: {
    isFocus() {
      return this.inputFocus ? true : !!this.value;
    }
  },

  methods: {
    emitInput(event) {
      this.$emit("input", event);
    },
    emitFocus(value) {
      this.inputFocus = value;
      this.$emit("focus", value);
    }
  },

  mounted() {
    this.input = this.value;
  }
};
</script>

<style lang="scss">
// Forms basic
// Input + label wrapper styles
.input {
  position: relative;
  padding: 16px 0 32px 0;

  // Text inputs
  input {
    // General Styles
    transition: all 0.3s;
    outline: none;
    width: 100%;
    height: 24px;
    box-shadow: none;
    border: none;
    border-bottom: 1px solid grey;
    border-radius: 0;
    box-sizing: content-box;
    background-color: transparent;

    // Focused input style
    &:focus:not([readonly]) {
      border-bottom: 2px solid black;
      // Focused label style
      ~ label {
        color: black;
        font-size: 12px;
        line-height: 12px;
      }
    }

    // Form message shared styles
    ~ label:after {
      content: "";
      position: absolute;
      top: 64px;
      display: block;
      opacity: 0;
      transition: 0.3s opacity ease-out, 0.3s color ease-out;
    }
    ~ .form-text {
      position: absolute;
      top: 64px;
      left: 0;
      right: 0;
    }

    // Valid input style
    &.valid,
    &:focus.valid {
      border-bottom: 1px solid green;
      box-shadow: 0 1px 0 0 green;
    }
    &.valid ~ label:after,
    &:focus.valid ~ label:after {
      content: attr(data-success);
      color: grey;
      opacity: 1;
    }
    &.valid ~ .form-text {
      color: grey;
    }

    // Invalid input style
    &.invalid,
    &:focus.invalid {
      border-bottom: 1px solid red;
      box-shadow: 0 1px 0 0 red;
    }
    &.invalid ~ label:after,
    &:focus.invalid ~ label:after {
      content: attr(data-error);
      color: red;
      opacity: 1;
    }
    &.invalid ~ .form-text {
      color: red;
    }
  }
  // Input with label
  .form-control {
    margin: 0;
    border-radius: 0;
    padding: 8px 0;
    background-image: none;
    background-color: transparent;
    &:focus {
      box-shadow: none;
      background: transparent;
    }
    &:disabled,
    &[readonly] {
      border-bottom: 1px solid grey;
      background-color: transparent;
    }
  }

  label {
    position: absolute;
    top: 24px;
    left: 0;
    transition: 0.3s ease-out;
    cursor: text;
    color: grey;
    z-index: -1;
    &.active {
      font-size: 12px;
      line-height: 12px;
      transform: translateY(-180%);
    }
  }
}
</style>
