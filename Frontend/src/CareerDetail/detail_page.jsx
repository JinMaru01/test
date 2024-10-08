import {
  React,
  useEffect,
  useState,
  useParams,
  Navbar,
  ScholarJobLogoWhite,
  appStore,
  ApplyModalJob,
  getJobDetail,
  MessagePopup,
  LoginImage,
  LoadingPage,
  Footer,
  // RelatedJobs,
} from "../import/all_import.jsx";

const DetailedJobPage = () => {
  const { jobId } = useParams();
  const [job, setJob] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const { setIsPopupOpen, isPopupOpen, message, isModalOpen , setIsModalOpen, token, clientId } = appStore();

  useEffect(() => {
    const fetchJobDetail = async () => {
      try {
        const data = await getJobDetail(jobId);
        setJob(data);
        setLoading(false);
      } catch (err) {
        setError(err.message);
        setLoading(false);
      }
    };

    fetchJobDetail();
  }, [jobId]);

  const handleApplyNowClick = () => {
    if (token !== null) {
      setIsModalOpen(true);
    } else {
      setIsModalOpen(false);
    }
    if(token === null){
      setIsPopupOpen(true);
    }
  };

  const handleCloseModal = () => {
    setIsModalOpen(false);
  };

  if (loading) {
    return <LoadingPage />;
  }

  if (error) {
    return <div>Error: {error}</div>;
  }

  if (!job) {
    return <LoadingPage />;
  }

  return (
    <div className="bg-gray-100 min-h-screen">
      <header className="p-6 bg-white shadow-md">
        <Navbar />
      </header>

      <div className="max-w-screen-lg  mx-auto p-8 bg-white shadow-lg rounded-lg mt-12">
        <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-6 rounded mb-8">
          <div className="flex items-center">
            <img
              src={job.image_url || ScholarJobLogoWhite}
              alt={job.title}
              className="w-32 h-32 object-cover mr-6 rounded"
            />
            <div className="text-white">
              <h1 className="text-2xl font-bold mb-2">{job.title}</h1>
              <p className="text-lg">
                {job.organization.name}, {job.organization.location}
              </p>
              <div className="text-gray-200 mt-2 flex">
                <p className="mr-6">
                  Publish Date: {new Date(job.created_at).toLocaleDateString()}
                </p>
                <p>
                  Closing Date: {new Date(job.deadline).toLocaleDateString()}
                </p>
              </div>
            </div>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
          <div className="border border-gray-300 rounded">
            <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
              <h2 className="text-lg font-semibold text-white">
                Job's Requirement
              </h2>
            </div>
            <div className="bg-white p-4 space-y-2">
              <div className="border-b border-gray-300 pb-2">
                Experience: {job.experience}
              </div>
              <div className="border-b border-gray-300 pb-2">
                Age Requirement: {job.age_require}
              </div>
              <div className="border-b border-gray-300 pb-2">
                Job Description:
                <div
                  className="bg-white"
                  dangerouslySetInnerHTML={{ __html: job.description }}
                />
              </div>
            </div>
          </div>

          <div className="border border-gray-300 rounded">
            <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
              <h2 className="text-lg font-semibold text-white">
                Job's Information
              </h2>
            </div>
            <div className="bg-white p-4 space-y-2">
              <div className="border-b border-gray-300 pb-2">
                Job Type: {job.job_type}
              </div>
              <div className="border-b border-gray-300 pb-2">
                Experience: {job.experience}
              </div>
              <div className="border-b border-gray-300 pb-2">
                Salary: {job.salary}
              </div>
              <div>Location: {job.organization.address}</div>
            </div>
          </div>
        </div>

        <div className="border border-gray-300 rounded mb-8">
          <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
            <h2 className="text-lg font-semibold text-white">
              Job's Responsibilities
            </h2>
          </div>
          <div
            className="bg-white p-4"
            dangerouslySetInnerHTML={{ __html: job.responsible }}
          />
        </div>

        <div className="border border-gray-300 rounded mb-8">
          <div className="bg-gradient-to-tl from-customTeal-light/50 to-customTeal-dark/80 text-white p-4 rounded-t">
            <h2 className="text-lg font-semibold text-white">
              Contact Information
            </h2>
          </div>
          <div className="bg-white p-4 space-y-2">
            <div className="border-b border-gray-300 pb-2">
              Phone Number: {job.organization.phone_number}
            </div>
            <div className="border-b border-gray-300 pb-2">
              Email: {job.organization.contact}
            </div>
            <div>Location: {job.organization.address}</div>
          </div>
        </div>

        <div className="text-center">
          <button
            onClick={handleApplyNowClick}
            className="bg-customTeal text-white  px-10 py-3 rounded-lg hover:bg-customTeal-dark text-lg shadow-md"
          >
            Apply Now!
          </button>
        </div>

        
          {/* <RelatedJobs /> */}
        
      </div>

      <br />
      <footer>
        <Footer />
      </footer>
      <ApplyModalJob
        isOpen={isModalOpen}
        onClose={handleCloseModal}
        clientId={clientId}
        jobId={job.id}
      />

      {isPopupOpen && (
        <MessagePopup
          MessagePopUp="Log in to gain access to download your CV"
          ImagePopup={LoginImage}
        />
      )}
    </div>
  );
};

export default DetailedJobPage;
