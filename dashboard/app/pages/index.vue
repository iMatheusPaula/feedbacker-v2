<script setup lang="ts">
definePageMeta({
  middleware: 'only-guest'
});
const modal = useModal();
function handleCreateAccount() {
  modal.open({
    component: 'ModalCreateAccount'
  });
}
async function test() {
  const {data} = await useApiFetch('/api/test');
  console.log(data.value);
}
async function testSanctum() {
  const {data} = await useApiFetch('/api/testSanctum');
  console.log(data.value);
}
</script>
<template>
  <!--  BANNER SECTION-->
  <section class="banner-section bg-brand-main w-full flex justify-center">
    <div class="banner-container flex flex-col w-4/5 max-w-6xl">
      <!--coluna texto e balao-->
      <div class="flex flex-col mt-28 max-w-fit">
        <h1 class="text-4xl font-black text-white">
          Tenha um feedback. <br>
          E faça seus clientes mais <br class="hidden lg:inline-block">
          felizes!
        </h1>
        <p class="text-lg font-medium text-white">
          Receba ideias, reclamações e feedbacks com um <br class="hidden lg:inline-block">
          simples widget na página.
        </p>
        <button
            id="home-btn-create-account"
            @click="test()"
            class="px-6 mt-10 py-2 font-bold bg-white rounded-full text-brand-main focus:outline-none"
        >
         test
        </button>
        <button
            id="home-btn-create-account"
            @click="testSanctum()"
            class="px-6 mt-10 py-2 font-bold bg-white rounded-full text-brand-main focus:outline-none"
        >
          test with sanctum
        </button>
      </div>
    </div>
  </section>
  <!-- CONTACT SECTION -->
  <div class="flex justify-center w-full bg-white">
    <div class="flex flex-col items-center w-4/5 max-w-6xl my-16">
      <h1 class="text-4xl font-black text-center text-gray-800">
        Alguma dúvida?
      </h1>
      <p class="text-lg text-center text-gray-800 font-regular">
        Quer saber melhor como funciona e quais são os preços?
      </p>
      <div class="mt-10">
        <a href="mailto:" class="px-6 py-2 mt-10 font-bold text-white rounded-full bg-brand-main focus:outline-none">
          Nos mande um e-mail!
        </a>
      </div>
    </div>
  </div>
  <!-- CONTACT SECTION-->
</template>
<style lang="postcss" scoped>
.banner-section{
  height: 500px;
}
@media (min-width: 640px){
  .banner-container{
    background-image: url("/images/blue-balloons.png");
    background-size: 450px;
    background-position: 90% 100%;
    background-repeat: no-repeat;
  }
}
</style>
