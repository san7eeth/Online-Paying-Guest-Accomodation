
    // Data for districts and cities in Kerala
    var keralaDistricts = {
        "Alappuzha": ["Alappuzha", "Chengannur", "Mavelikkara"],
        "Ernakulam": ["Kochi", "Kothamangalam", "Muvattupuzha"],
        "Idukki": ["Thodupuzha", "Peerumade"],
        "Kannur": ["Kannur", "Thalassery", "Payyannur"],
        "Kasaragod": ["Kasaragod", "Kanhangad"],
        "Kollam": ["Kollam", "Punalur"],
        "Kottayam": ["Kottayam", "Vaikom", "Changanassery"],
        "Kozhikode": ["Kozhikode", "Vadakara"],
        "Malappuram": ["Malappuram", "Manjeri"],
        "Palakkad": ["Palakkad", "Ottappalam"],
        "Pathanamthitta": ["Pathanamthitta", "Adoor"],
        "Thiruvananthapuram": ["Thiruvananthapuram", "Neyyattinkara"],
        "Thrissur": ["Thrissur", "Guruvayur"],
        "Wayanad": ["Kalpetta", "Sulthan Bathery"]
    };

    // Data for districts and cities in Tamil Nadu
    var tamilNaduDistricts = {
        "Ariyalur": ["Ariyalur", "Udayarpalayam"],
        "Chengalpattu": ["Chengalpattu", "Tambaram"],
        "Chennai": ["Chennai", "Madhavaram"],
        "Coimbatore": ["Coimbatore", "Tiruppur"],
        "Cuddalore": ["Cuddalore", "Chidambaram"],
        "Dharmapuri": ["Dharmapuri", "Palacode"],
        "Dindigul": ["Dindigul", "Palani"],
        "Erode": ["Erode", "Gobichettipalayam"],
        "Kallakurichi": ["Kallakurichi", "Ulundurpet"],
        "Kanchipuram": ["Kanchipuram", "Sriperumbudur"],
        "Kanyakumari": ["Nagercoil", "Padmanabhapuram"],
        "Karur": ["Karur", "Kulithalai"],
        "Krishnagiri": ["Krishnagiri", "Hosur"],
        "Madurai": ["Madurai", "Usilampatti"],
        "Mayiladuthurai": ["Mayiladuthurai", "Sirkazhi"],
        "Nagapattinam": ["Nagapattinam", "Mayiladuthurai"],
        "Namakkal": ["Namakkal", "Rasipuram"],
        "Nilgiris": ["Udhagamandalam", "Coonoor"],
        "Perambalur": ["Perambalur"],
        "Pudukkottai": ["Pudukkottai", "Aranthangi"],
        "Ramanathapuram": ["Ramanathapuram", "Paramakudi"],
        "Salem": ["Salem", "Attur"],
        "Sivaganga": ["Sivaganga", "Karaikudi"],
        "Tenkasi": ["Tenkasi", "Shenkottai"],
        "Thanjavur": ["Thanjavur", "Kumbakonam"],
        "Theni": ["Theni", "Periyakulam"],
        "Thoothukudi": ["Thoothukudi", "Tiruchendur"],
        "Tiruchirappalli": ["Tiruchirappalli", "Lalgudi"],
        "Tirunelveli": ["Tirunelveli", "Sankarankovil"],
        "Tirupathur": ["Tirupathur", "Ambur"],
        "Tiruppur": ["Tiruppur", "Avanashi"],
        "Tiruvallur": ["Tiruvallur", "Ponneri"],
        "Tiruvannamalai": ["Tiruvannamalai", "Arani"],
        "Tiruvarur": ["Tiruvarur", "Mannargudi"],
        "Vellore": ["Vellore", "Arakkonam"],
        "Viluppuram": ["Viluppuram", "Tindivanam"],
        "Virudhunagar": ["Virudhunagar", "Sivakasi"]
    };

    // Function to populate the districts dropdown based on selected state
    function populateDistricts() {
        var stateDropdown = document.getElementById("state");
        var districtDropdown = document.getElementById("district");
        var selectedState = stateDropdown.value;
        
        // Clear previous options
        districtDropdown.options.length = 0;
        districtDropdown.options.add(new Option("Select District", ""));

        // Populate districts based on selected state
        switch (selectedState) {
            case "Kerala":
                for (var district in keralaDistricts) {
                    var option = document.createElement("option");
                    option.text = district;
                    option.value = district;
                    districtDropdown.add(option);
                }
                break;
            case "Tamil Nadu":
                for (var district in tamilNaduDistricts) {
                    var option = document.createElement("option");
                    option.text = district;
                    option.value = district;
                    districtDropdown.add(option);
                }
                break;
            default:
                // Handle other states if needed
                break;
        }

        // Clear city dropdown when district changes
        var cityDropdown = document.getElementById("city");
        cityDropdown.options.length = 0;
        cityDropdown.options.add(new Option("Select City", ""));
    }

    // Function to populate the cities dropdown based on selected district
    function populateCities() {
        var districtDropdown = document.getElementById("district");
        var cityDropdown = document.getElementById("city");
        var selectedDistrict = districtDropdown.value;
        
        // Clear previous options
        cityDropdown.options.length = 0;
        cityDropdown.options.add(new Option("Select City", ""));

        // Populate cities based on selected district
        var citiesData;
        switch (document.getElementById("state").value) {
            case "Kerala":
                citiesData = keralaDistricts[selectedDistrict];
                break;
            case "Tamil Nadu":
                citiesData = tamilNaduDistricts[selectedDistrict];
                break;
            default:
                // Handle other states if needed
                break;
        }

        if (citiesData) {
            citiesData.forEach(function(city) {
                var option = document.createElement("option");
                option.text = city;
                option.value = city;
                cityDropdown.add(option);
            });
        }
    }

    // Populate districts dropdown initially
    populateDistricts();
