<script>
import { onMount } from "svelte"

let loggedIn = false
let role = null

onMount(() => {
  loggedIn = localStorage.getItem("loggedIn") === "true"
  role = localStorage.getItem("role")
})

function logout(){
  localStorage.removeItem("loggedIn")
  localStorage.removeItem("role")
  localStorage.removeItem("userEmail")
  window.location.href="/login"
}
</script>

<nav class="bg-gray-800 text-white p-4 flex gap-6">

	<a href="/" class="hover:underline">
		Home
	</a>

	<a href="/afspraken" class="hover:underline">
		Afspraken
	</a>
    {#if loggedIn}
	<a href="/afspraak-maken" class="hover:underline">
		Afspraak Maken
	</a>
    {/if}

	{#if !loggedIn}
		<a href="/login" class="hover:underline">
			Login
		</a>

		<a href="/register" class="hover:underline">
			Register
		</a>
	{/if}

	{#if role === "admin"}
		<a href="/admin" class="hover:underline">
			Admin
		</a>
    {/if}

    {#if loggedIn}
		<button on:click={logout} class="ml-auto bg-red-500 px-3 py-1 rounded">
			Logout
		</button>
	{/if}


</nav>