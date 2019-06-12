<template>
  <div class="button" :class="[disabled ? 'disabled' : '']" @click="emitClick">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    disabled: {
      type: Boolean,
      default: false
    }
  },

  methods: {
    emitClick(event) {
      if (!this.disabled) {
        this.$emit("click", event);
      }
    }
  }
};
</script>

<style lang="scss">
// Buttons
.button {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  transition: all 0.2s ease-in-out;
  padding: 24px;
  border: 0;
  border-radius: 15px;
  cursor: pointer;
  text-transform: uppercase;
  text-align: center;
  white-space: normal;
  word-wrap: break-word;
  color: inherit;
  &:hover,
  &:active,
  &:focus {
    box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18),
      0 4px 15px 0 rgba(0, 0, 0, 0.15);
    outline: 0;
  }
  &:not([disabled]):not(.disabled):active,
  &:not([disabled]):not(.disabled).active {
    box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18),
      0 4px 15px 0 rgba(0, 0, 0, 0.15);
  }
  &.disabled,
  &:disabled {
    &:active,
    &:focus,
    &:hover {
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    }
  }
}
</style>
