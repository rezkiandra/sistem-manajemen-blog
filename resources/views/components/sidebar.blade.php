<aside class="left-sidebar" data-sidebarbg="skin6">
  <div class="scroll-sidebar ps-container ps-theme-default ps-active-y" data-sidebarbg="skin6"
    data-ps-id="e614cc24-1955-f343-5e40-aa740f2a3028">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <x-sidebar-item :title="__('Dashboard')" :route="route('dashboard')" :icon="'fas fa-tachometer-alt'" />

        <x-divider>{{ __('Data Utama') }}</x-divider>
        <x-sidebar-dropdown :title="__('Blog')" :icon="'fab fa-blogger'" :active="request()->routeIs('blog.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('blog.create')" />
          <x-dropdown-item :title="__('List')" :route="route('blog.index')" />
        </x-sidebar-dropdown>

        <x-sidebar-dropdown :title="__('Blog Keyword')" :icon="'fas fa-key'" :active="request()->routeIs('blog-keyword.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('blog-keyword.create')" />
          <x-dropdown-item :title="__('List')" :route="route('blog-keyword.index')" />
        </x-sidebar-dropdown>

        <x-divider>{{ __('Data Lainnya') }}</x-divider>
        <x-sidebar-dropdown :title="__('Adsense')" :icon="'fab fa-google'" :active="request()->routeIs('adsense.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('adsense.create')" />
          <x-dropdown-item :title="__('List')" :route="route('adsense.index')" />
        </x-sidebar-dropdown>

        <x-sidebar-dropdown :title="__('Domain')" :icon="'fas fa-globe'" :active="request()->routeIs('domain.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('domain.create')" />
          <x-dropdown-item :title="__('List')" :route="route('domain.index')" />
        </x-sidebar-dropdown>

        <x-sidebar-dropdown :title="__('VPS')" :icon="'fas fa-server'" :active="request()->routeIs('vps.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('vps.create')" />
          <x-dropdown-item :title="__('List')" :route="route('vps.index')" />
        </x-sidebar-dropdown>

        <x-divider>{{ __('Data Master') }}</x-divider>
        <x-sidebar-dropdown :title="__('Provider')" :icon="'fas fa-handshake'" :active="request()->routeIs('provider.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('provider.create')" />
          <x-dropdown-item :title="__('List')" :route="route('provider.index')" />
        </x-sidebar-dropdown>

        <x-sidebar-dropdown :title="__('Topic')" :icon="'fas fa-comment-alt'" :active="request()->routeIs('topic.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('topic.create')" />
          <x-dropdown-item :title="__('List')" :route="route('topic.index')" />
        </x-sidebar-dropdown>

        <x-sidebar-dropdown :title="__('Keyword')" :icon="'fas fa-tag'" :active="request()->routeIs('keyword.*')">
          <x-dropdown-item :title="__('Tambah')" :route="route('keyword.create')" />
          <x-dropdown-item :title="__('List')" :route="route('keyword.index')" />
        </x-sidebar-dropdown>
    </nav>
  </div>
</aside>
