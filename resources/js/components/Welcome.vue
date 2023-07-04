<script setup>
import { ref, reactive } from 'vue';
import axios from 'axios';

const formData = ref({
  email: '',
  text: '',
  datetime: '',
});

const errors = reactive({
  email: '',
  text: '',
  datetime: '',
});

const successMessage = ref('');
const errorMessage = ref('');


async function submitForm() {
  resetErrors();

  if (!validateForm()) {
    return;
  }

  axios.post('/', formData.value)
    .then(response => {
      successMessage.value = response.data.message;
      console.log(response.data);
      resetForm();
    //   window.location.reload();
    })
    .catch(error => {
      console.error(error);
    });
}

function validateForm() {
  let isValid = true;

  if (!formData.value.email) {
    errors.email = 'Email is required.';
    isValid = false;
  }

  if (!formData.value.text) {
    errors.text = 'Text is required.';
    isValid = false;
  }

  if (!formData.value.datetime) {
    errors.datetime = 'Datetime is required.';
    isValid = false;
  }

  return isValid;
}

function resetErrors() {
  errors.email = '';
  errors.text = '';
  errors.datetime = '';
}

function resetForm() {
  formData.value.email = '';
  formData.value.text = '';
  formData.value.datetime = '';
}
</script>

<template>
    <!-- todo: create inputFieldComponent -->
    <div class="flex flex-col justify-center mx-auto max-w-md min-h-screen px-4 ">
        <form @submit.prevent="submitForm">
            <div v-if="successMessage" class="font-bold text-green-500 mb-6">{{ successMessage }}</div>
            <div class="relative z-0 mb-6 group w-full">
                <input type="email" id="email" v-model="formData.email"
                    class="w-full block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
            </div>

            <div class="relative z-0 mb-6 group w-full">
                <input type="text" id="text" v-model="formData.text"
                    class="w-full block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="text"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Text</label>
                    <span v-if="errors.text" class="text-red-500 text-sm">{{ errors.text }}</span>
            </div>

            <div class="relative z-0 mb-6 group w-full">
                <input type="datetime-local" id="datetime" v-model="formData.datetime"
                    class="w-full block py-2.5 px-0 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="datetime"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Datetime</label>
                    <span v-if="errors.datetime" class="text-red-500 text-sm">{{ errors.datetime }}</span>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</template>
