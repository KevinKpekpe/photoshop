        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md rounded-lg p-6 mr-8 h-full">
            <h2 class="text-xl font-semibold mb-6">Menu</h2>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded transition duration-200">
                            <i class="fas fa-shopping-cart mr-2"></i> Mes commandes
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile.show')}}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded transition duration-200">
                            <i class="fas fa-user mr-2"></i> Mon profil
                        </a>
                    </li>
                    <li>
                        <a href="{{route('password.change')}}" class="block py-2 px-4 text-blue-600 bg-blue-100 rounded transition duration-200">
                            <i class="fas fa-key mr-2"></i> Changer le mot de passe
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile.edit')}}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 rounded transition duration-200">
                            <i class="fas fa-edit mr-2"></i> Modifier le profil
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
