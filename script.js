const doctors = [
    { name: 'Dr.Aditya Gupta', specialty: ' Neurosurgeon', experience: '25 years of experience'},
    { name: 'Dr.Guru Yogi Shivan', specialty: 'Psychologist', experience: '44 years of experience' },
    { name: 'Dr.Girish Badarakhe', specialty: 'Clinical Oncologist', experience: '14 years of experience' },
    { name: 'Deenadayalan Munirathnam', specialty: 'Immunologist',experience:'12 years of experience'},
    { name: 'Dr Amuli Mistry', specialty: 'Dentist', experience: '14 years of experience' },
    { name: 'Dr. Deepak Natarajan', specialty: 'Cardiologist', experience: '46 years of experience' },

    // Add more doctor details as needed
];

// Function to render doctors' details on the webpage
function renderDoctors() {
    const doctorsList = document.getElementById('doctorsList');
    doctors.forEach(doctor => {
        const doctorCard = document.createElement('div');
        doctorCard.classList.add('doctor-card');
        doctorCard.innerHTML = `
            <h2>${doctor.name}</h2>
            <p><strong>Specialty:</strong> ${doctor.specialty}</p>
            <p><strong>Experience:</strong> ${doctor.experience}</p>
        `;
        doctorsList.appendChild(doctorCard);
    });
}

// Call the renderDoctors function when the page loads
document.addEventListener('DOMContentLoaded', renderDoctors);