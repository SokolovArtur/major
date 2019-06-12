<template>
  <div class="home">
    <section class="container">
      <div class="row">
        <Input
          class="col-md-4"
          :disabled="disabled"
          id="input__search"
          label="Введите палиндром"
          @focus="onInputFocus"
          v-model="search"
        />
        <Button
          class="col-md-offset-2 col-md-4"
          :disabled="disabled"
          @click="onClick"
        >
          Найти
        </Button>
      </div>
      <div class="result" v-if="showResult">
        <template v-if="palindromes.length">
          <div>Палиндромы:</div>
          <ul>
            <li v-for="(palindrome, index) in palindromes" :key="index">
              {{ palindrome }}
            </li>
          </ul>
        </template>
        <template v-else>
          <div>Палиндромы не найдены</div>
        </template>
      </div>
    </section>
  </div>
</template>

<script>
import jsonrpc from "@/plugins/jsonrpc";
import Button from "@/components/Button.vue";
import Input from "@/components/Input.vue";

export default {
  components: {
    Button,
    Input
  },

  data: () => ({
    inputFocus: false,
    disabled: false,
    palindromes: [],
    showResult: false,
    search: ""
  }),

  methods: {
    onClick() {
      this.disabled = true;

      jsonrpc("/api/v1/jsonrpc", "palindrome_getAllPalindromes", {
        value: this.search
      })
        .then(response => {
          this.palindromes = response;
          this.disabled = false;
          this.showResult = true;
        })
        .catch(error => {
          this.disabled = false;
          throw error;
        });
    },
    onInputFocus(event) {
      if (event) {
        this.showResult = false;
      }
    }
  }
};
</script>

<style lang="scss">
.home {
  .result {
    margin-top: 64px;
  }
}
</style>
