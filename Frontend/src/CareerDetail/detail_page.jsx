import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { Navbar,ScholarJobLogoWhite } from "../import/all_import.jsx"; 
import { getJobDetail } from '../API/career_api';

const DetailedJobPage = () => {
  const { jobId } = useParams();
  const [job, setJob] = useState(null);

  useEffect(() => {
    const fetchJobDetail = async () => {
      const data = await getJobDetail(jobId);
      setJob(data);
    };

    fetchJobDetail();
  }, [jobId]);

  if (!job) {
    return <div>Loading...</div>;
  }

  return (
    <div className="bg-gray-100 min-h-screen">
      <header className="p-6 bg-white shadow-md">
        <Navbar />
      </header>

      <div className="max-w-screen-lg mx-auto p-8 bg-white shadow-lg rounded-lg mt-6">
        <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-6 rounded mb-8">
          <div className="flex items-center">
            <img
              src={job.image_url || ScholarJobLogoWhite}
              alt={job.title}
              className="w-32 h-32 object-cover mr-6 rounded"
            />
            <div className="text-white">
              <h1 className="text-2xl font-bold mb-2">{job.title}</h1>
              <p className="text-lg">{job.organization.name}, {job.organization.location}</p>
              <div className="text-gray-200 mt-2 flex">
                <p className="mr-6">Publish Date: {new Date(job.created_at).toLocaleDateString()}</p>
                <p>Closing Date: {new Date(job.deadline).toLocaleDateString()}</p>
              </div>
            </div>
          </div>
        </div>
    
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
          <div className="border border-gray-300 rounded">
            <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
              <h2 className="text-lg font-semibold text-white">Job's Requirement</h2>
            </div>
            <div className="bg-white p-4 space-y-2">
              <div className="border-b border-gray-300 pb-2">Experience: {job.experience}</div>
              <div className="border-b border-gray-300 pb-2">Age Requirement: {job.age_require}</div>
              <div className="border-b border-gray-300 pb-2">Job Description: {job.description}</div>
            
            </div>
          </div>

          <div className="border border-gray-300 rounded">
            <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
              <h2 className="text-lg font-semibold text-white">Job's Information</h2>
            </div>
            <div className="bg-white p-4 space-y-2">
              <div className="border-b border-gray-300 pb-2">Job Category: {job.category.title}</div>
              <div className="border-b border-gray-300 pb-2">Job Type: {job.job_type}</div>
              <div className="border-b border-gray-300 pb-2">Experience: {job.experience}</div>
              <div className="border-b border-gray-300 pb-2">Salary: {job.salary}</div>
              <div>Location: {job.organization.address}</div>
            </div>
          </div>
        </div>

        <div className="border border-gray-300 rounded mb-8">
          <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
            <h2 className="text-lg font-semibold text-white">Job's Responsibilities</h2>
          </div>
          <div className="bg-white p-4">
          {job.responsible}
          </div>
        </div>

        <div className="border border-gray-300 rounded mb-8">
          <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
            <h2 className="text-lg font-semibold text-white">Contact Information</h2>
          </div>
          <div className="bg-white p-4 space-y-2">
            <div className="border-b border-gray-300 pb-2">Phone Number: {job.organization.phone_number}</div>
            <div className="border-b border-gray-300 pb-2">Email: {job.organization.contact}</div>
            <div>Location: {job.organization.address}</div>
          </div>
        </div>

        <div className="text-center">
          <button className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white text-white px-10 py-3 rounded-full hover:bg-green-600 text-lg shadow-md">
            Apply Now!
          </button>
        </div>
      </div>
    </div>
  );
};

export default DetailedJobPage;