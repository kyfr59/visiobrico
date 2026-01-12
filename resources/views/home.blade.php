<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>VisioBrico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>

    <nav class="flex flex-wrap justify-between items-center bg-white top-0 z-50">
        <div class="max-w-7xl px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <x-icon-logo />
                    <div class="flex flex-col">
                        <span class="text-xl font-semibold leading-tight">VisioBrico</span>
                        <span class="text-[10px] text-gray-500 leading-tight">Pensez visio pour vos travaux</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-4">
            <button id="mobile-menu-button" class="p-2 relative" aria-label="Menu" aria-expanded="false">
                <x-icon-menu class="text-gray-900" />
            </button>
        </div>
    </nav>

    <div class="w-full sticky top-0 z-40 bg-gray-100 border-y border-gray-300">
        <div class=" px-4 py-3">
            <div class="flex items-center gap-3">
                <button id="toggle-bricoleur"
                    class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2-500 bg-linear-to-r from-orange-500 to-orange-600 prestataire:from-white prestataire:to-white prestataire:text-gray-500 text-white shadow-md shadow-orange-200 prestataire:shadow-none">
                    Espace Bricoleur
                    <div
                        class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center font-medium border-2 border-white prestataire:bg-gray-400 prestataire:outline prestataire:outline-gray-300">
                        8</div>
                </button>
                <x-icon-switch-spaces />
                <button id="toggle-prestataire"
                    class="border relative border-gray-300 cursor-pointer flex-1 px-4 py-2.5 rounded-lg text-sm font-semibold transition-all flex items-center justify-center gap-2 bg-white text-gray-500 hover:bg-gray-50 bg-linear-to-r prestataire:from-blue-500 prestataire:to-blue-600 prestataire:text-white prestataire:shadow-md prestataire:shadow-blue-200">
                    Espace Prestataire
                    <div
                        class="absolute -top-2 -right-2 bg-gray-400 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center font-medium border-2 border-white outline outline-gray-300 prestataire:bg-blue-500 prestataire:outline-0">
                        4</div>
                </button>
            </div>
        </div>
    </div>

    <div id="menu" class="hidden border-b border-gray-300 shadow-lg px-6 overflow-hidden max-h-0 transition-all duration-700">
        <div class="py-2">
            <button
                class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-50 flex items-center gap-3 transition-colors hover:text-orange-500">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user w-5 h-5" aria-hidden="true">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span>Mon profil</span>
            </button>
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-50 flex items-center gap-3 transition-colors hover:text-orange-500">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-file-text w-5 h-5" aria-hidden="true">
                    <path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z"></path>
                    <path d="M14 2v5a1 1 0 0 0 1 1h5"></path>
                    <path d="M10 9H8"></path>
                    <path d="M16 13H8"></path>
                    <path d="M16 17H8"></path>
                </svg>
                <span>Mes réservations</span>
            </button>
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-50 flex items-center gap-3 transition-colors hover:text-orange-500">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-heart w-5 h-5" aria-hidden="true">
                    <path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path>
                </svg>
                <span>Mes favoris</span>
            </button>
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-50 flex items-center gap-3 transition-colors hover:text-orange-500">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-message-square w-5 h-5" aria-hidden="true">
                    <path
                        d="M22 17a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 21.286V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z">
                    </path>
                </svg>
                <span>Messages</span>
                <span class="ml-auto bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">8</span>
            </button>
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-50 flex items-center gap-3 transition-colors hover:text-orange-500">
                <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-bell w-5 h-5" aria-hidden="true">
                    <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                    <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path>
                </svg>
                <span>Notifications</span>
                <span class="ml-auto bg-orange-500 text-white text-xs px-2 py-0.5 rounded-full">5</span>
            </button>
            <button class="w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-50 flex items-center gap-3 transition-colors hover:text-orange-500"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-settings w-5 h-5" aria-hidden="true">
                    <path d="M9.671 4.136a2.34 2.34 0 0 1 4.659 0 2.34 2.34 0 0 0 3.319 1.915 2.34 2.34 0 0 1 2.33 4.033 2.34 2.34 0 0 0 0 3.831 2.34 2.34 0 0 1-2.33 4.033 2.34 2.34 0 0 0-3.319 1.915 2.34 2.34 0 0 1-4.659 0 2.34 2.34 0 0 0-3.32-1.915 2.34 2.34 0 0 1-2.33-4.033 2.34 2.34 0 0 0 0-3.831A2.34 2.34 0 0 1 6.35 6.051a2.34 2.34 0 0 0 3.319-1.915"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg><span>Paramètres</span>
            </button>
        </div>
    </div>


    <div class="px-6">
        <p>Raptim igitur properantes ut motus sui rumores celeritate nimia praevenirent, vigore corporum ac levitate
            confisi per flexuosas semitas ad summitates collium tardius evadebant. et cum superatis difficultatibus
            arduis ad supercilia venissent fluvii Melanis alti et verticosi, qui pro muro tuetur accolas circumfusus,
            augente nocte adulta terrorem quievere paulisper lucem opperientes. arbitrabantur enim nullo inpediente
            transgressi inopino adcursu adposita quaeque vastare, sed in cassum labores pertulere gravissimos.</p>

        <p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec
            dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes
            artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se
            continentur.</p>

        <p>Homines enim eruditos et sobrios ut infaustos et inutiles vitant, eo quoque accedente quod et nomenclatores
            adsueti haec et talia venditare, mercede accepta lucris quosdam et prandiis inserunt subditicios ignobiles
            et obscuros.</p>

        <p>Eminuit autem inter humilia supergressa iam impotentia fines mediocrium delictorum nefanda Clematii cuiusdam
            Alexandrini nobilis mors repentina; cuius socrus cum misceri sibi generum, flagrans eius amore, non
            impetraret, ut ferebatur, per palatii pseudothyrum introducta, oblato pretioso reginae monili id adsecuta
            est, ut ad Honoratum tum comitem orientis formula missa letali omnino scelere nullo contactus idem Clematius
            nec hiscere nec loqui permissus occideretur.</p>


        <p>Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post
            iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae
            suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi
            iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum
            promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in
            pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens
            mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares
            castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa
            oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis
            ostendit.</p>


        <p>Ultima Syriarum est Palaestina per intervalla magna protenta, cultis abundans terris et nitidis et civitates
            habens quasdam egregias, nullam nulli cedentem sed sibi vicissim velut ad perpendiculum aemulas: Caesaream,
            quam ad honorem Octaviani principis exaedificavit Herodes, et Eleutheropolim et Neapolim itidemque Ascalonem
            Gazam aevo superiore exstructas.</p>

        <p>Cyprum itidem insulam procul a continenti discretam et portuosam inter municipia crebra urbes duae faciunt
            claram Salamis et Paphus, altera Iovis delubris altera Veneris templo insignis. tanta autem tamque
            multiplici fertilitate abundat rerum omnium eadem Cyprus ut nullius externi indigens adminiculi indigenis
            viribus a fundamento ipso carinae ad supremos usque carbasos aedificet onerariam navem omnibusque armamentis
            instructam mari committat.</p>

        <p>Erat autem diritatis eius hoc quoque indicium nec obscurum nec latens, quod ludicris cruentis delectabatur et
            in circo sex vel septem aliquotiens vetitis certaminibus pugilum vicissim se concidentium perfusorumque
            sanguine specie ut lucratus ingentia laetabatur.</p>

        <p>Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque
            superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus
            membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare
            nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte
            multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui
            ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos
            interrogantis Cyprii regis inpegit.</p>

        Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio
        ad ea monstranda deflexerit quae Romae gererentur, nihil praeter seditiones narratur et tabernas et vilitates
        harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.
    </div>

    <div class="pt-8 fixed bt-5 bottom-0 w-full z-50">
        <div class="border-y shadow-[0_-6px_24px_rgba(0,0,0,0.12)] border-gray-300 bg-white relative px-6 py-3 flex justify-between items-center">
            <button class="flex flex-col items-center prestataire:text-blue-500 text-orange-500 text-xs font-medium">
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 9.5 12 3l9 6.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z" />
                </svg>
                Home
            </button>
            <button class="flex flex-col items-center text-gray-400 text-xs pr-6">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
                Search
            </button>
            <div class="absolute -top-7 left-1/2 -translate-x-1/2">
                <button
                    class="w-14 h-14 rounded-full prestataire:bg-blue-500 bg-orange-500 border-4 text-white flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 5v14M5 12h14" />
                    </svg>
                </button>
                <div class="text-gray-400 text-xs flex pt-1 w-14 text-center">Nouvelle demande</div>
            </div>
            <button class="flex flex-col items-center text-gray-400 text-xs pl-6">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" />
                    <path d="M12 7v5l3 3" />
                </svg>
                History
            </button>
            <button class="flex flex-col items-center text-gray-400 text-xs">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M6 20c0-3.3 2.7-6 6-6s6 2.7 6 6" />
                </svg>
                Profile
            </button>
        </div>
    </div>
    @yield('content')
</body>

</html>
